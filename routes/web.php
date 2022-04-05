<?php

use App\Http\Controllers\EquipeController;
use App\Http\Controllers\JoueurController;
use App\Models\Equipe;
use App\Models\Joueur;
use Illuminate\Support\Facades\Route;
use PhpParser\Node\Expr\BinaryOp\Equal;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    $equipes = Equipe::all();
    $joueurs = Joueur::all();
    return view('welcome', compact("equipes", "joueurs"));
});

Route::resource("/back/equipe", EquipeController::class);
Route::resource("/back/joueur", JoueurController::class);
