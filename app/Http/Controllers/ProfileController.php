<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use Illuminate\Database\Eloquent\Scope;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Builder;
use App\Profile;
class ProfileController extends Controller
{
    public function list_profiles_signed(Request $request){
      $profiles = Profile::join('areas','profiles.area_id','=','areas.id')
            ->select('profiles.*','areas.name')
            ->where('profiles.count','>=',3)
            ->get();
      return view('profiles_assigned_professionals.list_profiles_assigned', compact('profiles'));
    }

    /*
    listar perfiles ordenados de A-Z por titulo de perfil
    paginados hasta 10 perfiles
    */
    public function index(Request $request){ 
        $profiles = Profile::buscarPorTituloOEstudiante($request -> get('name'))
            -> orderBy('degree')
            -> paginate(10);
        return view('court_assignment.list_profiles') -> with('profiles', $profiles);
    }

    public function create()
    {

    }

    public function store(Request $request)
    {

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

    }
}
