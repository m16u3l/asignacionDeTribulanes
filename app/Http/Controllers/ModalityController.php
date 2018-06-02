<?php

namespace App\Http\Controllers;

use Excel;
use Validator;
use App\modality;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Input;

class ModalityController extends Controller
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

  public function show(modality $modality)
  {
    //
  }

  public function edit(modality $modality)
  {
    //
  }

  public function update(Request $request, modality $modality)
  {
    //
  }

  public function destroy(modality $modality)
  {
    //
  }

    public function upload_modalities()
  {
    return view('import.import_modalities');
  }

  public function import_modalities(Request $request)
  {
    $file = Input::file('modalitiesFile');
    $rules = array(
      'modalitiesFile' => 'required|mimes:xlsx',
    );
    $messages = array(
      'required' => 'ningun archivo xlsx seleccionado',
      'mimes' => 'el archivo debe estar en formato .xlsx'
    );

    $validator = Validator::make(Input::all(), $rules, $messages);
    if ($validator->fails()) {
      return redirect('import_modalities')->withErrors($validator);
    } else if(!$this->valid_document($file)) {

      return redirect('import_modalities')->with('bad_status', 'Documento invalido');

    } else if($validator->passes()) {
      Excel::load($file, function($reader)
      {
        foreach ($reader->get() as $key => $value) {
          $modality = Modality::where('name', $value->nombre)->first();
            if(is_null($modality)) {
              $modality = new Modality();
              $modality->name = $value->nombre;
              $modality->description = $value->descripcion;
              $modality->save();
            }
        }
      });
    }
    return redirect('import_modalities')->with('status', 'Los cambios se realizaron con exito.');
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
          $headers[2] == 'descripcion'){

        $valid = True;

      }
    });
    return $valid;
  }

}
