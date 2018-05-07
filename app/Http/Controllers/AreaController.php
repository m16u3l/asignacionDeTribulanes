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
      } else if($validator->passes()) {
         Excel::load($file, function($reader)
        {
          foreach ($reader->get() as $key => $value) {
            $area = Area::where('area_name', $value->area_name)->first();
            if(is_null($area)) {
              if (!is_null($value->area_name)) {
                $areas = new Area;
                $areas->area_name = $value->area_name;
                $areas->save();
              }
            }
          }
        });
      }
      return view('import.import_areas');
    }
}
