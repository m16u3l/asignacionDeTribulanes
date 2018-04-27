<?php

namespace App\Http\Controllers;

use App\Area;
use App\Assignement;
use App\Profile;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ProfileController extends Controller
{

	public function list_profiles_signed()
	{

		$profiles = DB::table('profiles')
			->join('areas', 'profiles.area_id', '=', 'areas.id')
			->join('student_profiles', 'profiles.id', '=', 'student_profiles.profile_id')
			->join('students', 'student_profiles.student_id', '=', 'students.id')
			->join('tutors', 'profiles.id', '=', 'tutors.profile_id')
			->join('professionals', 'tutors.professional_id', '=', 'professionals.id')
			->select('profiles.*','students.student_name','students.student_last_name_mother','students.student_last_name_father','areas.area_name'
			,'professionals.professional_name','professionals.professional_last_name_father','professionals.professional_last_name_mother')
			->where('profiles.count','>',2)
			->whereNotIn('profiles.id', DB::table('profiles')
					->select('profiles.id')
					->where('profiles.profile_finalized', '=', 'true'))
			->paginate(10);
		return view('profiles_assigned_professionals.list_profiles_assigned', compact('profiles'));

	}

	public function index(Request $request)
	{

		$profiles = Profile::join('areas', 'profiles.area_id', '=', 'areas.id')
			->join('student_profiles', 'profiles.id', '=', 'student_profiles.profile_id')
			->join('students', 'student_profiles.student_id', '=', 'students.id')
			->join('tutors', 'profiles.id', '=', 'tutors.profile_id')
			->join('professionals', 'tutors.professional_id', '=', 'professionals.id')
			->select('profiles.*','students.student_name','students.student_last_name_mother','students.student_last_name_father','areas.area_name'
			,'professionals.professional_name','professionals.professional_last_name_father','professionals.professional_last_name_mother')
			->buscarPorTituloOEstudiante($request->name)
			->orderBy('title')
			->paginate(10);

		 return view('court_assignment.list_profiles', compact('profiles'));

	}

	public function finalizar_perfil($id)
	{
		$profile = Profile::find($id);

		$professionals = DB::table('profiles')
			->join('assignements', 'profiles.id', '=', 'assignements.professional_id')
			->select('assignements.professional_id')
			->where('assignements.profile_id', '=', $id)
			->get();
			$profile1 = Profile::find($id);
			$profile1->profile_finalized=true;
			$profile1->save();
			foreach ($professionals as &$professional) {
				DB::table('professionals')->where('id', $professional->professional_id)->decrement('count');

 			}
      return redirect('profiles/asignados');
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
}
