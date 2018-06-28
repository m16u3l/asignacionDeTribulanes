<?php

namespace App\Http\Controllers;

use Excel;
use Validator;
use App\Profile;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Input;

class HomeController extends Controller
{

  public function index(Request $request)
  {

    $profiles = Profile::orderBy('title')
    ->search_by_title_or_student($request->name)
    ->paginate(5);

    return view('auth.login', compact('profiles'));
  
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

}
