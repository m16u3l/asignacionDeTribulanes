<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use App\Profile;
use App\Area;
use App\Professional;
class ProfessionalController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index($id)
    {
        $profile = Profile::find($id);
        $area= Area::find($profile->area_id);

        $professionals = DB::table('professionals')
            ->join('areas_interest', 'professionals.id', '=', 'areas_interest.professional_id')
            ->select('professionals.*')
            ->where('areas_interest.area_id','=',$area->id)
            ->orderBy('count')
            ->whereNotIn('professionals.id', DB::table('professionals')
                                            ->join('assignements', 'professionals.id', '=', 'assignements.professional_id')
                                            ->select('professionals.id'))
            ->get();

        $professionals_asignados = DB::table('professionals')
            ->join('assignements', 'professionals.id', '=', 'assignements.professional_id')
            ->select('professionals.*')
            ->where('assignements.profile_id','=',$profile->id)
            ->get();
        return view('court_assignment.list_professionals',compact('profile','area','professionals','professionals_asignados'));
        #return count($professionals_asignados);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
