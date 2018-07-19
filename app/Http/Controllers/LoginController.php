<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;

class LoginController extends Controller
{

    public function __construct()
    {
        $this->middleware('guest', ['except' => 'destroy']); //isto radimo i za loginController ali moramo paziti jer nam je tu i logout pa dodamo
        //deo sa except! pre je bilo bez toga, samo guest
       
    }
    public function create()
    {
        return view('auth.create-login');
    }

    public function store()
    {
        $credentials = request()->only(['email', 'password']);//daje email i pasvord 
        if(!auth()->attempt($credentials)){   //ako postoji loguje ga attempt vraca true ili false
        return redirect()->back()->withErrors([
            'message' => 'Bad credentials. Please try again.'
         ]);
        }
        return redirect('/posts');
    }
   public function destroy()
   {
       auth()->logout();
       return redirect('/posts');
   }
}
