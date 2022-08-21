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
    
     
    Route::post('/addrecept', [App\Http\Controllers\Admin\ReceptionnisteController::class,'store']);  


    Route::get('/citoyenadd', [App\Http\Controllers\Admin\CitoyenController::class,'index']);        
    Route::post('/citoyenadd', [App\Http\Controllers\Admin\CitoyenController::class,'store']);

});

Route::prefix('receptionniste')->group(function() { 
    Route::get('/dashboard', [App\Http\Controllers\ReceptionnisteController::class,'dashboard']);  
    Route::get('/rendezvous', [App\Http\Controllers\receptionniste\ReceptionnisteController::class,'rendezvous']);  

});

Route::prefix('citoyen')->group(function() { 
    Route::get('/dashboard', [App\Http\Controllers\Admin\CitoyenController::class,'dashboard']);  

});

Route::prefix('tout')->group(function() { 
    Route::post('/demandes', [App\Http\Controllers\DemandesController::class,'store']);  
    Route::get('/demandes', [App\Http\Controllers\DemandesController::class,'index']);  


});

Route::get('/recepadd', [App\Http\Controllers\Admin\ReceptionnisteController::class,'index']);        
Route::post('/recepadd', [App\Http\Controllers\Admin\ReceptionnisteController::class,'store']);

Route::get('/admiadd', [App\Http\Controllers\Admin\adminController::class,'index']);        
Route::post('/admiadd', [App\Http\Controllers\Admin\adminController::class,'store']);

                 