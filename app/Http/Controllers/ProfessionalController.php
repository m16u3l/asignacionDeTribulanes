<?php

namespace App\Http\Controllers;

use Exception;
use App\Area;
use App\Professional;
use App\Assignement;
use App\Profile;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Rap2hpoutre\FastExcel\FastExcel;
use Illuminate\Support\Facades\Input;

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
      $area = Area::find($profile->area_id);
      $allProfessionals = [] ;
      $professionals = DB::table('professionals')
        ->join('area_interests', 'professionals.id', '=', 'area_interests.professional_id')
        ->select('professionals.*')
        ->where('area_interests.area_id', '=', $area->id)
        ->orderBy('count')
        ->whereNotIn('professionals.id', DB::table('professionals')
            ->join('tutors', 'professionals.id', '=', 'tutors.professional_id')
            ->select('professionals.id')
            ->where('tutors.profile_id', '=', $profile->id))
        ->get();

        $url = '/register_tribunal';
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

          return view('court_assignment.list_professionals', compact('url', 'profile', 'area', 'professionals', 'allProfessionals'));
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

    public function uploadProfessionals($value='')
    {
      return view('import.import_professionals');
    }

    public function importProfessionals(Request $request)
    {
      $file = Input::file('fileProfessionals');
      (new FastExcel)->import($file, function ($line) {
        $professional = new Professional();
        $professional->professional_name = $line['NOMBRE '];
        $professional->professional_last_name_mother = $line['APELLIDO PATERNO '];
        $professional->professional_last_name_father = $line['APELLIDO MATERNO '];
        $professional->email = $line['CORREO'];
        $professional->degree = $line['TITULO DOCENTE'];
        $professional->workload = $line['CARGA HORARIA'];
        $professional->phone = $line['TELEFONO'];
        $professional->address = $line['DIRECCION'];
        $professional->profile = $line['PERFIL'];
        $professional->ci = $line['CI'];
        $professional->cod_sis = $line['COD SIS'];
        $professional->save();
      });

    }
}
