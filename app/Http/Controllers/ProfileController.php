<?php

namespace App\Http\Controllers;

use Excel;
use Validator;
use App\Student;
use App\Area;
use App\AcademicTerm;
use App\Assignement;
use App\AreaInterest;
use App\Modality;
use App\Professional;
use App\Profile;
use App\Date;
use App\State;
use App\Tutor;
use App\TypeLetter;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Input;

class ProfileController extends Controller
{
	public function solicitud_rununcia($id){
		$profile = Profile::find($id);
		$url = '/rejection_request';
		$area = $profile->areas->first();
		$courts=DB::table('professionals')
		->join('courts', 'professionals.id', '=', 'courts.professional_id')
		->select('professionals.*')
		->where('courts.profile_id', '=', $profile->id)
		->orderBy('count')
		->get();
		$professionals = DB::table('professionals')
		->join('area_interests', 'professionals.id', '=', 'area_interests.professional_id')
		->select('professionals.*')
		->where('area_interests.area_id', '=', $area->id)
		->whereNotIn('professionals.id', DB::table('professionals')
		->join('tutors', 'professionals.id', '=', 'tutors.professional_id')
		->select('professionals.id')
		->where('tutors.profile_id', '=', $profile->id))
		->whereNotIn('professionals.id', DB::table('professionals')
		->join('courts','professionals.id', '=', 'courts.professional_id')
		->select('professionals.id')
		->where('courts.profile_id', '=', $profile->id))
		->orderBy('count')
		->get();
		$allProfessionals = Professional::whereNotIn('professionals.id', DB::table('professionals')
		->join('tutors', 'professionals.id', '=', 'tutors.professional_id')
		->select('professionals.id')
		->where('tutors.profile_id', '=', $profile->id))
		->whereNotIn('professionals.id', DB::table('professionals')
		->join('area_interests','professionals.id', '=', 'area_interests.professional_id')
		->select('professionals.id')
		->where('area_interests.area_id', '=', $area->id))
		->whereNotIn('professionals.id', DB::table('professionals')
		->join('courts','professionals.id', '=', 'courts.professional_id')
		->select('professionals.id')
		->where('courts.profile_id', '=', $profile->id))
		->orderBy('count')
		->get();

		return view('profile.solicitud_rununcia', compact('url','profile','courts', 'professionals','allProfessionals'));
	}

	public function profiles_list(Request $request){
	/*	$profile = Profile::find(2);
		foreach ($profile->tutors as $menu) {
     //obteniendo los datos de un menu específico
     echo $menu->pivot->letter;

		 echo "a";
		 echo $menu->pivot->profile_id;
		 echo $menu->pivot->professional_id;
	 }*/


		$profiles = Profile::orderBy('title')
		->search_by_title_or_student($request->name)
		->paginate(10);
		return view('profile.profile_list', compact('profiles'));
	}
	public function registrar_letter(Request $request){
		$profile=Profile::find($request->profile_id);
		$tutor=Tutor::where('profile_id',$request->profile_id)
		->where('professional_id',$request->professional_id)
		->first();
		$tutor->letter=$request->valor;
		$tutor->save();

		$var=false;
		foreach ($profile->tutors as $tutor) {
     if($tutor->pivot->letter==true){
			 $var=true;
		 }else{
			 $var=false;
		 }
    }

		if($var){
			$state = State::where('name','approved')->first();
			$profile1 = Profile::find($request->profile_id);
			$profile1->state_id=$state->id;
			$profile1->save();
			$response = array("name"=>$request->name, "status"=>true);
		}
		return response()->json($response);
	}

	public function list_profile_finalized(Request $request)
	{
		$state = State::where('name','finalized')->first();
		if($state!=null){
			$profiles = Profile::where('state_id',$state->id)
			->search_by_title_or_student($request->name)
			->orderBy('title')
			->paginate(5);
		}else{
			$profiles = Profile::paginate(5);
		}
		return view('profile.list_profile_finalized', compact('profiles'));
	}

	public function list_profiles_signed(Request $request)
	{
		$state = State::where('name','assigned')->first();
		if($state!=null){
			$profiles = Profile::where('state_id',$state->id)
			->search_by_title_or_student($request->name)
			->orderBy('title')
			->paginate(5);
		}else{
			$profiles = Profile::paginate(5);
		}
		return view('profile.list_profile_assigned', compact('profiles'));
	}

	public function list_profile(Request $request)
	{
		$state = State::where('name','approved')->first();
		if($state!=null){
			$profiles = Profile::where('state_id',$state->id)
			->search_by_title_or_student($request->name)
			->orderBy('title')
			->paginate(5);
		}else{
			$profiles = Profile::paginate(5);
		}
		return view('profile.list_profile', compact('profiles'));
	}

	public function finalizar_perfil(Request $request)
	{
		$profile = Profile::find($request->profile_id);

		$now = new \DateTime();

		$state = State::where('name','finalized')->first();

		$profile1 = Profile::find($request->profile_id);
		$profile1->state_id=$state->id;
		$profile1->save();

		$dates = Date::where('profile_id','=',$profile->id)->first();
		$dates->finalized = $now;
		$dates->defended = $request->date_defended;
		$dates->save();

		foreach ($profile->courts as &$professional) {
			DB::table('professionals')->where('id', $professional->id)->decrement('count');
		}
		return redirect('perfiles/asignados');
	}

	public function index()
	{

	}

	public function create()
	{

	}

	public function store(Request $request)
	{

	}

	public function show($id)
	{
		$profile = Profile::find($id);
		$view = view('profile.profile_report', compact('profile'));
		$pdf = \App::make('dompdf.wrapper');
		$pdf->loadHtml($view);
		return $pdf->stream('$profile');
	}

	public function edit($id)
	{
		//
	}

	public function update(Request $request, $id)
	{
		//
	}

	public function destroy($id)
	{

	}

	public function upload_profiles($value='')
	{
		return view('import.import_profiles');
	}

	public function import_profiles(Request $request)
	{	
		$news = 0;
		$salto = chr(13).chr(10);
		$file = Input::file('fileProfiles');
		$rules = array(
			'fileProfiles' => 'required|mimes:xlsx',
		);
		$messages = array(
			'required' => 'ningun archivo xlsx seleccionado',
			'mimes' => 'el formato no es compatible',
		);
		$validator = Validator::make(Input::all(), $rules, $messages);
		$this->fill_states();
		$this->fill_type_letters();
		if ($validator->fails()) {

			return redirect('import_profiles')->withErrors($validator);

		} else if(!$this->valid_document($file)) {

			return redirect('import_profiles')->with('bad_status', 'Documento invalido');

		} else if($validator->passes()) {

			Excel::load($file, function($reader) use (&$news)
			{
				foreach ($reader->get() as $key => $value) {

					$modality = Modality::where('name', $value->modalidad_titulacion)->first();

					$now = new \DateTime();

					$profile = Profile::where('title', $value->titulo_proyecto_final)
					->where('objective', $value->objetivo_general)
					->first();

					$student = Student::where('name', $value->nombre_postulante)
					->where('last_name_father', $value->apellido_paterno_postulante)
					->where('last_name_mother', $value->apellido_materno_postulante)
					->where('career', $value->carrera)
					->first();

					$professional_tutor = Professional::where('name', $value->nombre_tutor)
					->where('last_name_father', $value->apellido_paterno_tutor)
					//->where('last_name_mother', $value->apellido_materno_tutor)
					->first();

					$area = Area::where('name', $value->area)->first();

					if(!is_null($professional_tutor) && !is_null($area)) {
						$area_interest = AreaInterest::where('area_id', $area->id)
											->where('professional_id', $professional_tutor->id)
											->first();
						if(is_null($area_interest)) {
							$area_interest = new AreaInterest();
							$area_interest->area_id = $area->id;
							$area_interest->professional_id = $professional_tutor->id;
							$area_interest->save();
						}
					}

					if(!is_null($professional_tutor) && !is_null($modality)) {

						if(is_null($profile)) {

							$state = State::where('name', 'initiated')->first();

							//                $academic_term = new AcademicTerm();
							//                $academic_term->date_ini = $now->format('d-m-Y');
							//                $academic_term->date_fin = $now->format('d-m-Y');
							//                $academic_term->period = 1;
							//                $academic_term->save();


							$profile = new Profile();
							$profile->title = $value->titulo_proyecto_final;
							$profile->objective = $value->objetivo_general;
							$profile->modality_id  = $modality->id;
							$profile->state_id = $state->id;
							//                $profile->academic_term_id = $academic_term->id;
							//$profile->area_id = $area->id;
							$profile->save();
							$news++;


							$area->profiles()->attach($profile->id);


							if (!is_null($student)) {
								$student->profiles()->attach($profile->id);
							}

							$date = new Date();
							$date->initiated = $now;
							$date->profile_id = $profile->id;
							$date->save();

							$professional_tutor->profiles_tutors()->attach($profile->id);

						}

						if (is_null($student)) {
							$student = new Student();
							$student->name = $value->nombre_postulante;
							$student->last_name_father = $value->apellido_paterno_postulante;
							$student->last_name_mother = $value->apellido_materno_postulante;
							$student->career = $value->carrera;
							$student->save();

							$student->profiles()->attach($profile->id);
						}
					}



				}
			});
			return redirect('import_profiles')->with('status', 'Los cambios se realizaron con exito: '. $news. ' datos añadidos' );
		}
	}

	public function valid_document($file)
	{
		$valid = False;
		Excel::load($file, function($reader) use (&$valid) {
			$rs = $reader->get();
			$row = $rs[0];
			$headers = $row->keys();
			if( $headers[0] == 'titulo_proyecto_final' &&
			$headers[1] == 'nombre_tutor' &&
			$headers[2] == 'apellido_paterno_tutor' &&
			$headers[3] == 'apellido_materno_tutor' &&
			$headers[4] == 'nombre_postulante' &&
			$headers[5] == 'apellido_paterno_postulante' &&
			$headers[6] == 'apellido_materno_postulante' &&
			$headers[7] == 'objetivo_general' &&
			$headers[8] == 'area' &&
			$headers[9] == 'modalidad_titulacion' &&
			$headers[10] =='carrera') {

				$valid = True;

			}
		});

		return $valid;
	}

	private function fill_states() {
		$state = State::where('name', 'initiated')->first();
		if(is_null($state)) {
			$state = new State();
			$state->name = 'initiated';
			$state->save();
		} 
		$state = State::where('name', 'approved')->first();
		if (is_null($state)) {
			$state = new State();
			$state->name = 'approved';
			$state->save();
		}
		$state = State::where('name', 'approved')->first();
		if (is_null($state)) {
			$state = new State();
			$state->name = 'approved';
			$state->save();
		}
		$state = State::where('name', 'assigned')->first();
		if (is_null($state)) {
			$state = new State();
			$state->name = 'assigned';
			$state->save();
		}
		$state = State::where('name', 'finalized')->first();
		if (is_null($state)) {
			$state = new State();
			$state->name = 'finalized';
			$state->save();
		}
		$state = State::where('name', 'defended')->first();
		if (is_null($state)) {
			$state = new State();
								$state->name = 'defended';
								$state->save();
		}
		$state = State::where('name', 'abandoned')->first();
		if (is_null($state)) {
			$state = new State();
			$state->name = 'abandoned';
			$state->save();
		}
	}

	private function fill_type_letters() {
		$type_letter = TypeLetter::where('name', 'tutor')->first();
		if (is_null($type_letter)) {
			$type_letter = new TypeLetter();
			$type_letter->name = 'tutor';
			$type_letter->save();
		}

		$type_letter = TypeLetter::where('name', 'supervisor')->first();
		if (is_null($type_letter)) {
			$type_letter = new TypeLetter();
			$type_letter->name = 'supervisor';
			$type_letter->save();
		}

		$type_letter = TypeLetter::where('name', 'docente')->first();
		if (is_null($type_letter)) {
			$type_letter = new TypeLetter();
			$type_letter->name = 'docente';
			$type_letter->save();
		}
	}

	private function fill_letter($id) {

		$letter = Letter::where('profile_id', $id)->first();
		$profile = Profile::where('id', $id)->first();
		if(is_null($letter)) {
			$letter->profile_id = $profile->id;
			
		}

	}

}
