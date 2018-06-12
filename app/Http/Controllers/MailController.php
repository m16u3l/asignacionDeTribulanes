<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Mail;
use Session;
use Redirect;
use App\Profile;
class MailController extends Controller
{
    public function store(Request $request){
        $profile = Profile::find($request->profile_id);
        Mail::send('email.send_mail', compact('profile'), function($mensaje){
            $mensaje->subject('Correo');
            //cambiar aqui para poder enviar el correo
            $mensaje->to('leticia.blanco@gmail.com');
        });

        Session::flash('message','Correo enviado con exito');
        return Redirect::to('/perfiles/asignados');
    }
}
