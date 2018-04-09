<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use App\Profile;
class ProfileController extends Controller
{
    public function index()
    {
        $profiles = Profile::all();
        return view('court_assignment.list_profiles', compact('profiles'));
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
