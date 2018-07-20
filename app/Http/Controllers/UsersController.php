<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;

class UsersController extends Controller
{
    public function show(User $user)
    {
       // $user = User::find($id); //ovo bi bilo da sam preko id-a..i onda i u rutu umesto{user} ide {id}
        return view('users.show', ['user' => $user]);
    }
}
