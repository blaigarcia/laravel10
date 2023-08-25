<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\User;
use Grosv\LaravelPasswordlessLogin\LoginUrl;

use App\Mail\SigninEmail;
use Illuminate\Support\Facades\Mail;


class MagiclinkController extends Controller
{

// get user email
public function getEmail() {
    return view('Magiclink.login');
}

// send Magiclink
public function sendEmail(Request $request) {
    $request->validate([
        'email' => 'required|email'
    ]);

    $user = User::where('email', $request->email)->first();

    if($user != null && $user->count() != 0) {
        $generator = new LoginUrl($user);
        $generator->setRedirectUrl('/dashboard');
        $url = $generator->generate();


        // send the email
        //Mail::to($user)->queue(new Magiclink($url));

        Mail::send(new SigninEmail($user, $url));

       // return redirect("/login/magiclink?send=success");
       session()->flash('flash.banner', 'Se ha enviado el Magiclink a su email: '. $user->email.'. Recuerde verificar su bandeja de SPAM. Puede cerrar esta ventana.');
       session()->flash('flash.bannerStyle', 'success');

       return back();

    }

    $msgTxt = 'No hay registrado ningún usuario con el email: '. $request->email;
    session()->flash('flash.banner', $msgTxt);
    session()->flash('flash.bannerStyle', 'danger');

    return back();

}

}
