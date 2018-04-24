<?php

namespace App\Http\Controllers;

use App\Area;
use App\Assignement;
use App\Profile;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ProfessionalController extends Controller
{

    public function index($id)
    {
      $url = '/register_tribunal';
      $profile = Profile::find($id);
      $area = Area::find($profile->area_id);
      $professionals = DB::table('professionals')
        ->join('area_interests', 'professionals.id', '=', 'area_interests.professional_id')
        ->select('professionals.*')
        ->where('area_interests.area_id', '=', $area->id)
        ->orderBy('count')
        ->whereNotIn('professionals.id', DB::table('professionals')
            ->join('tutors', 'professionals.id', '=', 'tutors.professional_id')
            ->select('professionals.id')
            ->where('tutors.profile_id', '=', $profile->id))
        ->whereNotIn('professionals.id', DB::table('professionals')
        ->join('assignements', 'professionals.id', '=', 'assignements.professional_id')
        ->select('professionals.id')
        ->where('assignements.profile_id', '=', $profile->id))
        ->get();

        $professionals_asignados = DB::table('professionals')
        ->join('assignements', 'professionals.id', '=', 'assignements.professional_id')
        ->select('professionals.*')
        ->where('assignements.profile_id', '=', $profile->id)
        ->get();

          $allProfessionals = DB::table('professionals')
            ->orderBy('count')
            ->whereNotIn('professionals.id', DB::table('professionals')
                ->join('tutors', 'professionals.id', '=', 'tutors.professional_id')
                ->select('professionals.id')
                ->where('tutors.profile_id', '=', $profile->id))
            ->whereNotIn('professionals.id', DB::table('professionals')
            ->join('area_interests','professionals.id', '=', 'area_interests.professional_id')
            ->select('professionals.id')
            ->where('area_interests.area_id', '=', $area->id))
            ->get();
            
          return view('court_assignment.list_professionals', compact('url', 'profile', 'area', 'professionals','professionals_asignados', 'allProfessionals'));
    }

    public function store(Request $request)
    {
			$url = 'profiles/';
			$profile_id = $request->profile_id;
			$professional_id = $request->professional_id;

			$assignement = new Assignement;
			$assignement->profile_id = $profile_id;
			$assignement->professional_id = $professional_id;
			$assignement->assigned = '2008-12-2';
			$assignement->save();

			DB::table('profiles')->where('id', $profile_id)->increment('count');
			DB::table('professionals')->where('id', $professional_id)->increment('count');

			return redirect($url . $profile_id);

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
        //
    }
}
