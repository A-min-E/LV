<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\createUserRequest;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    public function register(){
        return view('users.register');
    }
    public function handleRegistration(User $user,createUserRequest $req){
        //first methode to create the user
        $user->name = $req->nom;
        $user->email = $req->email;
        $user->password = Hash::make($req->password);
        $user->save();

        //seconde methode to create the user
            // user::create([
            //     'name' => $req->nom,
            //     'email' => $req->email,
            //     'password' => $req->password
            // ]);

        return redirect()->route('acceuil')->with("success","l'utilisateur à été ajouter par success");
    }
}
