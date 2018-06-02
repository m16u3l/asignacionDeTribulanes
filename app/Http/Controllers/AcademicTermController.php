<?php

namespace App\Http\Controllers;

use Excel;
use Validator;
use App\AcademicTerm;
use App\academic_term;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Input;

class AcademicTermController extends Controller
{

  public function index()
  {
    //
  }

  public function create()
  {
    //
  }

  public function store(Request $request)
  {
    //
  }

  public function show(academic_term $academic_term)
  {
    //
  }

  public function edit(academic_term $academic_term)
  {
    //
  }

  public function update(Request $request, academic_term $academic_term)
  {
    //
  }

  public function destroy(academic_term $academic_term)
  {
    //
  }

  public function upload_periods()
  {
    return view('import.import_periods');
  }

  public function import_periods(Request $request)
  {
    $file = Input::file('periodsFile');
    $rules = array(
      'periodsFile' => 'required|mimes:xlsx',
    );
    $messages = array(
      'required' => 'ningun archivo xlsx seleccionado',
      'mimes' => 'el formato no es compatible'
    );
    $validator = Validator::make(Input::all(), $rules, $messages);
    if ($validator->fails()) {

      return redirect('import_periods')->withErrors($validator);

    } else if(!$this->valid_document($file)) {

      return redirect('import_periods')->with('bad_status', 'Documento invalido');

    } else if($validator->passes()) {

      Excel::load($file, function($reader)
      {
        foreach ($reader->get() as $key => $value) {

          if(!is_null($value->fecha_ini) &&
             !is_null($value->fecha_fin) &&
             !is_null($value->periodo)) {

            $date = AcademicTerm::where('date_ini', $value->fecha_ini)
                                ->where('date_fin', $value->fecha_fin)
                                ->where('period', $value->periodo)
                                ->first();

            if(is_null($date)) {
            $date = new AcademicTerm();
            $date->date_ini = $value->fecha_ini;
            $date->date_fin = $value->fecha_fin;
            $date->period = $value->periodo;
            $date->save();
            }
            
          }
        }
      });
    }
    return redirect('import_periods')->with('status', 'Los cambios se realizaron con exito.');
  }

  public function valid_document($file)
  {
    $valid = False;
    Excel::load($file, function($file) use (&$valid){
      $rs = $file->get();
      $row = $rs[0];
      $headers = $row->keys();
      if( $headers[0] == 'codigo' &&
          $headers[1] == 'fecha_ini' &&
          $headers[2] == 'fecha_fin' &&
          $headers[3] == 'periodo') {

          $valid = True;
      }
    });

    return $valid;
  }

}
