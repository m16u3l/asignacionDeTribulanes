<?php

namespace App\Http\Controllers;

use Exception;
use Excel;
use Validator;
use Redirect;
use App\Area;
use App\Professional;
use App\Court;
use App\Profile;
use App\State;
use App\Date;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Rap2hpoutre\FastExcel\FastExcel;
use Illuminate\Support\Facades\Input;

class ProfessionalController extends Controller
{
    public function professional_list(Request $request){
        $professionals = Professional::orderBy('professional_name')
                    ->search_by_name($request->name)
                    ->paginate(10);
		return view('professional.professional_list', compact('professionals'));
	}

    public function index(Request $request, $id)
  {
      $url = '/registrar_tribunal';
      $profile = Profile::find($id);

      $area = $profile->areas->first();

      $professionals = DB::table('professionals')
        ->join('area_interests', 'professionals.id', '=', 'area_interests.professional_id')
        ->select('professionals.*')
        ->where('area_interests.area_id', '=', $area->id)

        ->whereNotIn('professionals.id', DB::table('professionals')
            ->join('tutors', 'professionals.id', '=', 'tutors.professional_id')
            ->select('professionals.id')
            ->where('tutors.profile_id', '=', $profile->id))
        ->whereNotIn('professionals.id', DB::table('professionals')
            ->join('courts','professionals.id', '=', 'courts.professional_id')
            ->select('professionals.id')
            ->where('courts.profile_id', '=', $profile->id))
        ->orderBy('count')
        ->get();
        //->paginate(10);

            $allProfessionals = Professional::whereNotIn('professionals.id', DB::table('professionals')
                            ->join('tutors', 'professionals.id', '=', 'tutors.professional_id')
                            ->select('professionals.id')
                            ->where('tutors.profile_id', '=', $profile->id))
                        ->whereNotIn('professionals.id', DB::table('professionals')
                            ->join('area_interests','professionals.id', '=', 'area_interests.professional_id')
                            ->select('professionals.id')
                            ->where('area_interests.area_id', '=', $area->id))
                        ->whereNotIn('professionals.id', DB::table('professionals')
                            ->join('courts','professionals.id', '=', 'courts.professional_id')
                            ->select('professionals.id')
                            ->where('courts.profile_id', '=', $profile->id))

                        ->orderBy('count')
                        ->get();
                        //->paginate(10);

        return view('professional.assign_professinal', compact('url','profile', 'professionals','allProfessionals'));

    }

    public function store(Request $request)
    {

      $now = new \DateTime();
			$url = 'perfiles/';
			$profile_id = $request->profile_id;
			$professional_id = $request->professional_id;

      $state = State::where('name','assigned')->first();

      $profile=Profile::find($request->profile_id);
      $profile->state_id=$state->id;
      $profile->save();

      $dates = Date::where('profile_id','=',$profile_id)->first();
      $dates->assigned = $now->format('d-m-Y');
      $dates->save();

			$court = new Court;
			$court->profile_id = $profile_id;
			$court->professional_id = $professional_id;

			$court->assigned = $now->format('d-m-Y');
			$court->save();

			DB::table('profiles')->where('id', $profile_id)->increment('count');
			DB::table('professionals')->where('id', $professional_id)->increment('count');

			return redirect($url);

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
      } else if(!$this->valid_document($file)) {

        return redirect('import_professionals')->with('bad_status', 'Documento invalido');
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
      return redirect('import_professionals')->with('status', 'Los cambios se realizaron con exito.');
    }

    public function valid_document($file)
    {
      $valid = False;
      Excel::load($file, function($file) use (&$valid){
          $rs = $file->get();
          $row = $rs[0];
          $headers = $row->keys();
          if( $headers[0] == 'nombre' &&
              $headers[1] == 'apellido_paterno' &&
              $headers[2] == 'apellido_materno' &&
              $headers[3] == 'correo' &&
              $headers[4] == 'titulo_docente' &&
              $headers[5] == 'carga_horaria' &&
              $headers[6] == 'nombre_cuenta' &&
              $headers[7] == 'telefono' &&
              $headers[8] == 'direccion' &&
              $headers[9] == 'perfil' &&
              $headers[10] == 'contrasena_cuenta' &&
              $headers[11] == 'ci' &&
              $headers[12] == 'cod_sis') {

             $valid = True;

          }

       });
      return $valid;
     }
}
