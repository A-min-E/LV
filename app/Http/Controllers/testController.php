<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\ValidateFormRequest;
use App\Models\articles;

class testController extends Controller
{
    public function accueil(){
    }

    public function index(){
        $articles = articles::all();
        return view("accueil",[
            'articles' => $articles
        ]);
    }

    public function store(articles $article,ValidateFormRequest $req){
        // dd($req);
        $verify = $req;

        if($verify){
            echo 'verefication is passed';
        }
        else{
            return redirect()->back();
        }

        articles::create([
            'titre' => $req->titre,
            'description' => $req->description
        ]);

        return redirect()->back()->with("success","l'article à été bien ajouter");

    }
    public function methode1($userName){
        return "Bonjour : ".$userName;
    }
    public function methode2(){
        return "this is the seconde methode";
    }
}
