<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\apiController\apiAdminController\adminController;
use App\Http\Controllers\apiController\apiAdminController\Gestion_Projet\ProjetAdminController;

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

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});

//Login
//Route::post('/login', 'apiController\UserController@login');

//Route pour le sawgger

// Route::get('/',function(){
//     return response()->json([
//         'message' =>'Welcome to the laravel API'
//     ]);
// });

//  Route::get('/api',[adminController::class,'swagger'])->name('swagger');

 Route::get('/list-project/communale',[App\Http\Controllers\apiController\apiAdminController\Gestion_Projet\ProjetAdminController::class,'index']);
 Route::get('/list-project/communale/{id}',[App\Http\Controllers\apiController\apiAdminController\Gestion_Projet\ProjetAdminController::class,'show']);
 Route::post('/create-project/communale',[App\Http\Controllers\apiController\apiAdminController\Gestion_Projet\ProjetAdminController::class,'store']);
 Route::put('/list-project/communale/{id}',[App\Http\Controllers\apiController\apiAdminController\Gestion_Projet\ProjetAdminController::class,'update']);
 Route::delete('/delete-project/communale/{id}',[App\Http\Controllers\apiController\apiAdminController\Gestion_Projet\ProjetAdminController::class,'destroy']);

// Route::resource('project/communale', App\Http\Controllers\apiController\apiAdminController\Gestion_Projet\ProjetAdminController::class)->only([
//     'index','store', 'update', 'destroy'
//   ])->middleware('jwt');


/**
 * ROUTE IDEE FOR USER AND ADMIN
 */
Route::post('/create-idee/communale',[App\Http\Controllers\apiController\apiAdminController\Gestion_Projet\IdeeAdminController::class,'store']);
Route::get('/list-idee/communale',[App\Http\Controllers\apiController\apiAdminController\Gestion_Projet\IdeeAdminController::class,'index']);
Route::get('/list-idee/communale/{id}',[App\Http\Controllers\apiController\apiAdminController\Gestion_Projet\IdeeAdminController::class,'show']);
Route::put('/list-idee/communale/{id}',[App\Http\Controllers\apiController\apiAdminController\Gestion_Projet\IdeeAdminController::class,'update']);
Route::delete('/list-idee/communale/{id}',[App\Http\Controllers\apiController\apiAdminController\Gestion_Projet\IdeeAdminController::class,'destroy']);

//Api pour le listing des propositions d'idéee supprimé
Route::get('/delete-idee/communale/',[App\Http\Controllers\apiController\apiAdminController\Gestion_Projet\IdeeAdminController::class,'ideeDelete']);
