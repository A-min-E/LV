<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\createUserRequest;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;
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

    public function handleLogin(Request $request){
        //select * from users where email = $email && password = $password
        // this part usefull if you don't ghave
        $credentials = $request->validate([
            'email' => ['required','email'],
            'password' => ['required']
        ]);
        if(Auth::attempt($credentials)){
            //$_SESSION['user_logged'] = ture (en php)
            $request->session()->regenerate();
            return redirect()->intended("home");
        }else{
            return redirect()->back()->with('error','Information de connexion non reconnu ');
        }
    }

    public function dashboard(){
        return view("dashboard");
    }

    public function logout(){
        Session::flush();
        Auth::logout();
        return redirect('login');
    }
}
