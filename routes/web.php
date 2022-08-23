<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

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
    return view('welcome');
});





Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');


Route::prefix('admin')->group(function() { 
    Route::get('/dashboard', [App\Http\Controllers\Admin\adminController::class,'dashboard']);  
    Route::get('/dashboard', [App\Http\Controllers\Admin\adminController::class,'view']);  
    Route::get('/dashboard',[\App\Http\Controllers\Admin\ReceptionnisteController::class,'dashboard']);
     

    Route::get('/citoyenadd', [App\Http\Controllers\Admin\CitoyenController::class,'index']);        
    Route::post('/citoyenadd', [App\Http\Controllers\Admin\CitoyenController::class,'store']);

});

Route::prefix('receptionniste')->group(function() { 

});

Route::prefix('citoyen')->group(function() { 
    Route::get('/dashboard', [App\Http\Controllers\Admin\CitoyenController::class,'dashboard']);  

});


    // Route de vue pour demandes et declaration//
    Route::post('/listecidemande', [App\Http\Controllers\Demandescarte::class,'store'])->name('demandeci');  
    Route::get('/listecidemande', [App\Http\Controllers\Demandescarte::class,'index']);  
    Route::get('/listecrdemandes', [App\Http\Controllers\DemandesController::class,'viewcr']);  
 
    
    // End //


Route::get('addrecept',[App\Http\Controllers\Receptionnistekoura::class,'index']);
Route::post('addrecept',[App\Http\Controllers\Receptionnistekoura::class,'store']);


Route::get('/admiadd', [App\Http\Controllers\Admin\adminController::class,'index'])->name('adminadd');        
Route::post('/admiadd', [App\Http\Controllers\Admin\adminController::class,'store']);

                 