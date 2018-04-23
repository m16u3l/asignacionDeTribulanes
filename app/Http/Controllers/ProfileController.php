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
			->select('profiles.*', 'areas.name')
			->where('profiles.count', '>=', 3)
			->get();
		return view('profiles_assigned_professionals.list_profiles_assigned', compact('profiles'));
	}

	public function index()
	{
		$profiles = DB::table('profiles')->paginate(10);
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

			foreach ($professionals as &$professional) {
				DB::table('professionals')->where('id', $professional->professional_id)->decrement('count');

 			}

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
