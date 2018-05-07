<?php

namespace App\Http\Controllers;

use Exception;
use Excel;
use Validator;
use Redirect;
use App\Area;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Rap2hpoutre\FastExcel\FastExcel;
use Illuminate\Support\Facades\Input;

class AreaController extends Controller
{
  public function upload_areas($value='')
  {
    $messages = null;
    return view('import.import_areas', compact('messages'));
  }

  public function import_areas(Request $request)
  {
    $file = Input::file('areasFile');
    $rules = array(
       'areasFile' => 'required|mimes:xlsx',
    );
    $messages = array(
        'required' => 'ningun archivo xlsx seleccionado',
        'mimes' => 'el archivo debe estar en formato .xlsx'
    );

    $validator = Validator::make(Input::all(), $rules, $messages);
    if ($validator->fails()) {
        return redirect('import_areas')->withErrors($validator);
    } else if(!$this->valid_document($file)) {

      return redirect('import_areas')->with('bad_status', 'Documento invalido');
    } else if($validator->passes()) {
       Excel::load($file, function($reader)
      {
        foreach ($reader->get() as $key => $value) {
          $areas = Area::where('area_codigo', $value->codigo)->first();
          if(is_null($areas)) {
            if (!is_null($value->codigo) &&
                !is_null($value->nombre)) {
              $area = new Area;
              $area->area_codigo = $value->codigo;
              $area->area_name = $value->nombre;
              $area->area_descripcion = $value->descripcion;
              //$area->area_id = $value->codigo_subarea;
              $area->save();
            }
          }
        }
      });
    }
    return redirect('import_areas')->with('status', 'Los cambios se realizaron con exito.');
  }

  public function valid_document($file)
  { 
    $valid = False;
    Excel::load($file, function($file) use (&$valid){
        $rs = $file->get();
        $row = $rs[0];
        $headers = $row->keys();
        if( $headers[0] == 'codigo' &&
            $headers[1] == 'nombre' &&
            $headers[2] == 'descripcion' &&
            $headers[3] == 'codigo_subarea') {
           $valid = True;
        }

     });
    return $valid;
   }
}
