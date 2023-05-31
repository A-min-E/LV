<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\testController;
use App\Http\Controllers\ArticleController;
use App\Http\Controllers\UserController;
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
Route::get("/acceuil",[testController::class,'index'])->name("acceuil");

// Route::get("/article/{id}",[testController::class,'findeArticle']);
// Route::get("/articles/{article}",[testController::class,'findeArticle']);
// Route::get("/articles/{article}/edit",[testController::class,'editArticle']);
// Route::put("/articles/{article}/update",[testController::class,"update"]);
// Route::delete("/articles/{article}/delete",[testController::class,"deleteArticle"]);

//route pour la page ajout articles
// Route::post("/articles",[ArticleController::class,'AddArticle']);

//php methodes  $_POST || $_GET

//middleware gest
Route::middleware(['guest'])->group(function(){
    //Authentication
        //registration
        Route::get("/register",[UserController::class,'register'])->name('registration');
        Route::post('/register',[UserController::class,'handleRegistration'])->name("registration");
        //login
        Route::get("/login",[UserController::class,'login'])->name("login");
        Route::post('/login',[UserController::class,'handleLogin'])->name('login');
});

//middleware auth
Route::middleware(['auth'])->group(function(){
    Route::post("/acceuil",[testController::class,'store']);
    // use grouping route
    Route::prefix('articles')->group(function(){
        Route::get("/{article}",[testController::class,'findeArticle'])->name("article.show")->withoutMiddleware('auth');
        Route::get("/{article}/edit",[testController::class,'editArticle'])->name('article.edit');
        Route::put("/{article}/update",[testController::class,"update"])->name('article.update');
        Route::delete("/{article}/delete",[testController::class,"deleteArticle"])->name("article.delete");
    });
    Route::get("home",[UserController::class,'dashboard']);
});


