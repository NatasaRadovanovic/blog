<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;

class RegisterController extends Controller
{
    public function __construct()
    {
        $this->middleware('guest'); //pogledaj u middleware karnel.php
        // i u redirectedifAuthenticated.php menjamo i /posts ,pre je bilo u home
        //poenta da ako si ulogovan ne mozes opet da ides na register,mora prvo da se izlogujmo
        // i sada ne da da se ide na register nego vraca na posts odma, tek kada se izlogujemo
        //moze opet na register
        //isto radimo i za loginController ali moramo paziti jer nam je tu i logout pa dodamo
        //deo sa except! pre je bilo pre toga
    }
    public function create()
    {
        return view('auth.create');
    }

    public function store()
    {
        $this->validate(request(), ['name' =>'required',
         'email' => 'required|email|unique:users',
         'password' => 'required|min: 6'
         ]); 
        
      $user = User::create([
            'name' => request('name'),
            'email' => request('email'),
            'password' => bcrypt(request('password')) //da se pasvord ne vidi
        ]);
        auth()->login($user); //helper koji ima gomilu metoda, i tako logujemo korisnika
        
        return redirect('/posts');
    }
}
