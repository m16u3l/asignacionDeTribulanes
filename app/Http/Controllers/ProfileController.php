<?php

namespace App\Http\Controllers;

use App\Area;
use App\Assignement;
use App\Profile;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

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
}
