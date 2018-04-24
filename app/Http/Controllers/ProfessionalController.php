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

    public function index($id)
    {
      $url = '/register_tribunal';
      $profile = Profile::find($id);
      $area = Area::find($profile->area_id);
      $student = DB::table('profiles')
        ->join('student_profiles', 'profiles.id', '=', 'student_profiles.profile_id')
        ->select('students.*')
        ->where('student_profiles.profile_id','=',$profile->area_id)
        ->join('students', 'student_profiles.student_id', '=', 'students.id')
        ->get()
        ->first();

        $tutor = DB::table('profiles')
          ->join('tutors', 'profiles.id', '=', 'tutors.profile_id')
          ->select('professionals.*')
          ->where('tutors.profile_id','=',$profile->area_id)
          ->join('professionals', 'tutors.professional_id', '=', 'professionals.id')
          ->get()
          ->first();

      $professionals = DB::table('professionals')
        ->join('area_interests', 'professionals.id', '=', 'area_interests.professional_id')
        ->select('professionals.*')
        ->where('area_interests.area_id', '=', $area->id)

        ->whereNotIn('professionals.id', DB::table('professionals')
            ->join('tutors', 'professionals.id', '=', 'tutors.professional_id')
            ->select('professionals.id')
            ->where('tutors.profile_id', '=', $profile->id))
        ->whereNotIn('professionals.id', DB::table('professionals')
            ->join('assignements','professionals.id', '=', 'assignements.professional_id')
            ->select('professionals.id')
            ->where('assignements.profile_id', '=', $profile->id))
        ->orderBy('count')
        ->get();

        $professionals_asignados = DB::table('professionals')
            ->join('assignements','professionals.id', '=', 'assignements.professional_id')
            ->where('assignements.profile_id', '=', $profile->id)
            ->get();
          $allProfessionals = DB::table('professionals')
            ->whereNotIn('professionals.id', DB::table('professionals')
                ->join('tutors', 'professionals.id', '=', 'tutors.professional_id')
                ->select('professionals.id')
                ->where('tutors.profile_id', '=', $profile->id))
            ->whereNotIn('professionals.id', DB::table('professionals')
                ->join('area_interests','professionals.id', '=', 'area_interests.professional_id')
                ->select('professionals.id')
                ->where('area_interests.area_id', '=', $area->id))
            ->whereNotIn('professionals.id', DB::table('professionals')
                ->join('assignements','professionals.id', '=', 'assignements.professional_id')
                ->select('professionals.id')
                ->where('assignements.profile_id', '=', $profile->id))
            ->orderBy('count')
            ->get();

          return view('court_assignment.list_professionals', compact('url','tutor','student' ,'profile', 'area', 'professionals', 'professionals_asignados','allProfessionals'));
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
        Professional::firstOrCreate(array(
            'professional_name' => $line['NOMBRE '],
            'professional_last_name_mother' => $line['APELLIDO MATERNO '],
            'professional_last_name_father' => $line['APELLIDO PATERNO '],
            'email' => $line['CORREO'],
            'degree' => $line['TITULO DOCENTE'],
            'workload' => $line['CARGA HORARIA'],
            'phone' => $line['TELEFONO'],
            'address' => $line['DIRECCION'],
            'profile' => $line['PERFIL'],
            'ci' => $line['CI'],
            'cod_sis' => $line['COD SIS'],
          ));
      });
      return view('import.import_professionals');
    }
}
