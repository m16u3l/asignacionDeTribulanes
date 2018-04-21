<?php

namespace App\Http\Controllers;

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
