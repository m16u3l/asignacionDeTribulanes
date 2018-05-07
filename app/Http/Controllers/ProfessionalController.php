<?php

namespace App\Http\Controllers;

use Exception;
use Excel;
use Validator;
use Redirect;
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

    public function index(Request $request, $id)
    {
      $url = '/registrar_tribunal';
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
          $allProfessionals = Professional::whereNotIn('professionals.id', DB::table('professionals')
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
            ->search_by_name($request->name)
            ->orderBy('count')
            ->get();

          return view('professional.assign_professinal', compact('url','tutor','student' ,'profile', 'area', 'professionals', 'professionals_asignados','allProfessionals'));
    }

    public function store(Request $request)
    {
			$url = 'perfiles/';
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
      $messages = null;
      return view('import.import_professionals', compact('messages'));
    }


    public function importProfessionals(Request $request)
    {
      $file = Input::file('fileProfessionals');
      $rules = array(
         'fileProfessionals' => 'required|mimes:xlsx',
          );
      $messages = array(
          'required' => 'ningun archivo xlsx seleccionado',
          'mimes' => 'el archivo debe estar en formato .xlsx'
      );

      $validator = Validator::make(Input::all(), $rules, $messages);
      if ($validator->fails()) {
          return redirect('import_professionals')->withErrors($validator);
      } else if($validator->passes()) {
         Excel::load($file, function($reader)
        {
          foreach ($reader->get() as $key => $value) {
            $prof = Professional::where('ci', $value->ci)->first();
            if(is_null($prof)) {
              if (!is_null($value->nombre) &&
                  !is_null($value->apellido_materno) &&
                  !is_null($value->apellido_paterno)) {
                $professional = new Professional;
                $professional->professional_name = $value->nombre;
                $professional->professional_last_name_mother = $value->apellido_materno;
                $professional->professional_last_name_father = $value->apellido_paterno;
                $professional->email = $value->correo;
                $professional->degree = $value->titulo_docente;
                $professional->workload = $value->carga_horaria;
                $professional->phone = $value->telefono;
                $professional->address = $value->direccion;
                $professional->profile = $value->perfil;
                $professional->ci = $value->ci;
                $professional->cod_sis = $value->cod_sis;
                $professional->save();
              }
            }
          }
        });
      }
      return view('import.import_professionals');
    }
}
