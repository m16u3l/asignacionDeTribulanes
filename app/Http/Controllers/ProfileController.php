<?php

namespace App\Http\Controllers;

use Excel;
use Validator;
use App\Student;
use App\Area;
use App\Assignement;
use App\Professional;
use App\Profile;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Input;

class ProfileController extends Controller
{
	public function profiles_list(Request $request){
		$profiles = Profile::orderBy('title')
					->search_by_title_or_student($request->name)
					->paginate(10);
		return view('profile.profile_list', compact('profiles'));
	}

	public function list_profile_finalized(Request $request)
	{
		$profiles = Profile::where('count','>=',3)
												->where('profile_finalized',true)
												->search_by_title_or_student($request->name)
												->orderBy('title')
												->paginate(5);

		return view('profile.list_profile_finalized', compact('profiles'));
	}
	public function list_profiles_signed(Request $request)
	{
		$profiles = Profile::where('count','>=',3)
												->where('profile_finalized',false)
												->search_by_title_or_student($request->name)
												->orderBy('title')
							        	->paginate(5);

		return view('profile.list_profile_assigned', compact('profiles'));
	}
	public function list_profile(Request $request)
	{
		$profiles = Profile::where('count','<',3 )
											->Letters()
											->search_by_title_or_student($request->name)
											->orderBy('title')
											->paginate(5);

		 return view('profile.list_profile', compact('profiles'));
	}

	public function finalizar_perfil(Request $request)
	{
	  	$profile = Profile::find($request->profile_id);
      $now = new \DateTime();

			$profile1 = Profile::find($request->profile_id);
			$profile1->profile_finalized=true;
			$profile1->finalized_date=$now->format('d-m-Y');
			$profile1->save();

			foreach ($profile->assingements as &$professional) {
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
		//
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

	public function uploadProfiles($value='')
    {
      return view('import.import_profiles');
    }

    public function importProfiles(Request $request)
    {
       $salto = chr(13).chr(10);
       $file = Input::file('fileProfiles');
       $rules = array(
         'fileProfiles' => 'required|mimes:xlsx',
          );
       $messages = array(
          'required' => 'ningun archivo xlsx seleccionado',
          'mimes' => 'el archivo debe estar en formato .xlsx'
       );
       $validator = Validator::make(Input::all(), $rules, $messages);
      if ($validator->fails()) {

          return redirect('import_profiles')->withErrors($validator);

      } else if(!$this->valid_document($file)) {

        return redirect('import_profiles')->with('bad_status', 'Documento invalido');

      } else if($validator->passes()) {

      	Excel::load($file, function($reader)
        {
       	  foreach ($reader->get() as $key => $value) {

            $profile = Profile::where('title', $value->titulo_proyecto_final)
                  ->where('objective', $value->objetivo_general)
                  ->where('degree_modality', $value->modalidad_titulacion)
                  ->first();

            $student = Student::where('student_name', $value->nombre_postulante)
                  ->where('student_last_name_father', $value->apellido_paterno_postulante)
                  ->where('student_last_name_mother', $value->apellido_materno_postulante)
                  ->where('career', $value->carrera)
                  ->first();

            $professional_tutor = Professional::where('professional_name', $value->nombre_tutor)
                    ->where('professional_last_name_father', $value->apellido_paterno_tutor)
              //->where('professional_last_name_mother', $value->apellido_materno_tutor)
              ->first();

            $area = Area::where('area_name', $value->area)->first();

            if(!is_null($professional_tutor)) {

              if(is_null($profile)) {
                $profile = new Profile;
                $profile->title = $value->titulo_proyecto_final;
                $profile->objective = $value->objetivo_general;
                $profile->degree_modality  = $value->modalidad_titulacion;
                $profile->area_id = $area->id;
                $profile->save();    

                $professional_tutor->profiles_tutors()->attach($profile->id);
              
              }

              if (is_null($student)) {
                $student = new Student;
                $student->student_name = $value->nombre_postulante;
                $student->student_last_name_father = $value->apellido_paterno_postulante;
                $student->student_last_name_mother = $value->apellido_materno_postulante;
                $student->career = $value->carrera;
                $student->save();

                $student->profiles()->attach($profile->id);
              }
            }
          }
        });
      	return redirect('import_profiles')->with('status', 'Los cambios se realizaron con exito.' );
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
}