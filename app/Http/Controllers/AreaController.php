<?php

namespace App\Http\Controllers;

use Exception;
use Excel;
use Validator;
use Redirect;
use App\Area;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Input;

class AreaController extends Controller
{
  public function areas_list(Request $request){
    $areas = Area::orderBy('name')
    ->paginate(18);
    return view('area.areas_list', compact('areas'));
  }

  public function create(Request $request){
    try {
      $new_area = new Area;
      $new_area->name = $request->name;
      $new_area->descripcion = $request->description;
      $new_area->codigo=1;
      $new_area->save();

      $response = array("name"=>$request->name, "status"=>true);

    }
    catch (QueryException $e){
      return response()->json(array("status"=>false));
    }
    return response()->json($response);
  }

  public function upload_areas($value='')
  {
    $messages = null;
    return view('import.import_areas', compact('messages'));
  }

  public function import_areas(Request $request)
  {
    $news = 0;
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
      Excel::load($file, function($reader) use (&$news)
      {
        foreach ($reader->get() as $key => $value) {
          $area = Area::where('codigo', $value->codigo)->first();
          if(is_null($area)) {
            if (!is_null($value->codigo) &&
            !is_null($value->nombre)) {

              $sub_area = Area::where('id', $value->codigo_subarea)->first();

              $area = new Area;
              $area->codigo = $value->codigo;
              $area->name = $value->nombre;
              $area->descripcion = $value->descripcion;

              if (!is_null($sub_area)) {
                $area->area_id = $sub_area->id;
              }
              $area->save();
              $news++;
            }
          }
        }
      });
    }
    return redirect('import_areas')->with('status', 'Los cambios se realizaron con exito: '. $news. ' datos añadidos');
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
