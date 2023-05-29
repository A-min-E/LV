<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\createUserRequest;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;
use App\Http\Requests\UserLoginRequest;

class UserController extends Controller
{
    public function register(){
        return view('users.register');
    }

    public function login(){
        return view("users.login");
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

    public function handleLogin(UserLoginRequest $userLoginReq){
        //select * from users where email = $email && password = $password
        if(Auth::attempt($userLoginReq)){
            //$_SESSION['user_logged'] = ture (en php)
            $userLoginReq->session()->regenerate();
            return redirect()->inrended("dashboard");
        }else{

        }
    }
}
