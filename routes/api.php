<?php

use Illuminate\Http\Request;
use App\Http\Controllers\AuthController;
use Illuminate\Support\Facades\Route;
use App\Models;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});
/**
 *
 * Stampa degli atleti
 *
 */
Route::get('/getAtleta', 'App\Http\Controllers\AtletaController@getAtleta');

/**
 *
 * Stampa di un solo atleta in base al suo ID
 *
 */
Route::get('/idAtleta/{id}','App\Http\Controllers\AtletaController@getAtletaById');



/**
 *
 * Inserimento personal trainer (nome, cognome).
 *
 */
Route::post('postPersonalTrainer', [\App\Http\Controllers\PersonalTrainerController::class, 'postPersonalTrainer']);

/**
 *
 * Inserimento scheda (id personal trainer, id atleta, categoria, nome esercizio,
 * ripetizione, volte, categorie perse).
 *
 */
Route::post('postScheda', [\App\Http\Controllers\SchedaController::class, 'postScheda']);

/**
 *
 * Aggiorna un atleta ricercandolo in base al suo ID.
 *
 */
Route::put('updateAtleta/{id}', '\App\Http\Controllers\AtletaController@updateAtleta');

/**
 *
 * Elimina un atltea in base al suo ID
 *
 */
Route::delete('deleteAtleta/{id}', '\App\Http\Controllers\AtletaController@deleteAtleta');

/**
 *
 * Login
 *
 */
Route::get('login/{email}{password}', '\App\Http\Controllers\LoginController@getLogin');

/**
 *
 * Creazione account
 *
 */
Route::post('postLogin', [\App\Http\Controllers\LoginController::class, 'postLogin']);


Route::post('registrazione', [AuthController::class, 'registro']);

Route::get('/getAtleta', [\App\Http\Controllers\AtletaController::class,'getAtleta']);
/**
 *
 * protegge la route
 *
 */
Route::group(['middleware'=>['auth:sanctum']], function () {

    /**
     *
     * Inserimento atleta (nome, cognome).
     *
     */
    Route::post('postAtleta', [\App\Http\Controllers\AtletaController::class, 'postAtleta']);
});
