<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\testController;
use App\Http\Controllers\ArticleController;
/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

//On ustilisont echo ou return dans web
// Route::get("/test",function(){
//     echo "this is a message in other page";
// });

// Route::get("/exemple",function(){
//     return "this is the exemple";
// });

//On ustilisont controlleur
Route::get("/test/{userName}",[testController::class,'methode1']);

Route::get("/exemple",[testController::class,'methode2']);

//appelai la page acceuil depuis le route
// Route::get("/accueil",function(){
//     return view("acceuil");
// });

//appelai la page acceuil depuis le controller
Route::get("/acceuil",[testController::class,'index']);
Route::post("/acceuil",[testController::class,'store']);
// Route::get("/article/{id}",[testController::class,'findeArticle']);
Route::get("/article/{article}",[testController::class,'findeArticle']);
Route::get("/articles/{article}/edit",[testController::class,'editArticle']);
Route::put("/articles/{article}/update",[testController::class,"update"]);
Route::delete("/articles/{article}/delete",[testController::class,"deleteArticle"]);

//route pour la page ajout articles
// Route::post("/articles",[ArticleController::class,'AddArticle']);

//php methodes  $_POST || $_GET
