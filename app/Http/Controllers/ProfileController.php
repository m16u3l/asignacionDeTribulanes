<?php

namespace App\Http\Controllers;

use Excel;
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

	public function list_profiles_signed(Request $request)
	{
		$profiles = Profile::where('count','>=',3)
												->search_by_title_or_student($request->name)
												->orderBy('title')
							        	->paginate(5);

		return view('profile.list_profiles_assigned', compact('profiles'));
	}

	public function index(Request $request)
	{
		$profiles = Profile::where('count','<',3 )
											->Letters()
											->search_by_title_or_student($request->name)
											->orderBy('title')
											->paginate(5);

		 return view('profile.list_profiles', compact('profiles'));
	}


	public function finalizar_perfil(Request $request)
	{
	  	$profile = Profile::find($request->profile_id);

			$profile1 = Profile::find($request->profile_id);
			$profile1->profile_finalized=true;
			$profile1->save();

			foreach ($profile->assingements as &$professional) {
				DB::table('professionals')->where('id', $professional->id)->decrement('count');
	 		}
			return redirect('perfiles/asignados');
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
      $file = Input::file('fileProfiles');
      	Excel::load($file, function($reader)
        {

       		$news = 0; 
       	  foreach ($reader->get() as $key => $value) {

       	  	$profile = new Profile;
          	$profile->title = $value->titulo_proyecto_final;
          	$profile->objective = $value->objetivo_general;
          	$profile->degree_modality  = $value->modalidad_titulacion;
          	$profile->save();
          	$news++;



          	$professional_tutor = Professional::where('professional_name', $value->nombre_tutor)
          					->where('professional_last_name_father', $value->apellido_paterno_tutor)
							//->where('professional_last_name_mother', $value->apellido_materno_tutor)
							->first();

			if (False) {
			$student = new student;
			$student->student_name = $value->nombre_postulante;
			$student->student_last_name_father = $value->apellido_paterno_postulante;
			$student->student_last_name_mother = $value->apellido_materno_postulante;
			$student->career = $value->carrera;
			$student->save();
			
			}
          }
          dd($news);
        });
      return view('import.import_profiles');
    }
}
