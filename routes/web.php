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
    Route::get('/dashboard',[\App\Http\Controllers\Admin\ReceptionnisteController::class,'dashboard'])->name('recepdash');
     

    Route::get('/citoyenadd', [App\Http\Controllers\Admin\CitoyenController::class,'index']);        
    Route::post('/citoyenadd', [App\Http\Controllers\Admin\CitoyenController::class,'store']);

});

Route::prefix('receptionniste')->group(function() { 

});

Route::prefix('citoyen')->group(function() { 
    Route::get('/dashboard', [App\Http\Controllers\Admin\CitoyenController::class,'dashboard'])->name('');  

});
    //admin ka demandiw routouw   
    Route::get('/voila',[\App\Http\Controllers\Admin\Demandeciadmin::class,'index'])->name('adminokay');
        Route::post('/adminkademandekai',[App\Http\Controllers\Admin\Demandeciadmin::class,'store'])->name('admintablakata');
        Route::get('/adminkademande',[App\Http\Controllers\Admin\Demandecradmin::class,'index'])->name('admintawairai');
        Route::post('/adminkademande',[App\Http\Controllers\Admin\Demandecradmin::class,'store'])->name('admintabla');

    //

    // Route de vue et envoie demandes pour citoyen//
    Route::post('/listecidemande', [App\Http\Controllers\Demandescarte::class,'store'])->name('demandeci');  
    Route::get('/listecidemande', [App\Http\Controllers\Demandescarte::class,'index'])->name('demandecitoiyen');
    Route::get('/citoyen.listecrdemandes', [App\Http\Controllers\Demandescerti::class,'index'])->name('demandecrcitoyen');
    Route::post('/citoyen.listecrdemandes', [App\Http\Controllers\Demandescerti::class,'store'])->name('certiblakata'); 
     
    
    


    
    
    // Route::post('/demandedotchi',[App\Http\Controllers\receptionniste\cartedidentite::class,'store'])->name('cartegnini');
    // Route::post('/demadecoura', [\App\Http\Controllers\receptionniste\cartedidentite::class, 'store'])->name('carte.coura');
    Route::get('/demandecirecp',[App\Http\Controllers\receptionniste\Demandecirep::class,'index'])->name('demandecartecpstore');
    Route::post('/demandecoura', [\App\Http\Controllers\receptionniste\cartedidentiteController::class, 'create'])->name('carte.create'); 
    // Route::post('/demandecitchi',[App\Http\Controllers\receptionniste\Demandecirep::class,'nextstore'])->name('ok') ;
    // Route::post('/listedemandecarte',[App\Http\Controllers\receptionniste\Demandecirep::class,'nextstore'])->name('demandecidentitestore');
    // Route::post('/listecerdemande', [App\Http\Controllers\Demandescerti::class,'store'])->name('listecidemande');
    // Route::post('/listedemandecarte',[App\Http\Controllers\receptionniste\Demandecirep::class,'store'])->name('demandecartecpstore');



    Route::get('/demandecrrecp',[App\Http\Controllers\receptionniste\Demandescertif::class,'index'])->name('listecerdemandes');
    Route::post('/listedemandecarte',[App\Http\Controllers\receptionniste\Demandescertif::class,'store'])->name('demandecerrecpstore'); 
    Route::post('/confirmdemande',[App\Http\Controllers\receptionniste\RendezvousController::class,'store'])->name('confirmdemandeci');
    Route::post('/confirmdemandecr',[App\Http\Controllers\receptionniste\RendezvousController::class,'confcr'])->name('confirmdemandecr');


       
    
    
    // End //


Route::get('/addrecept',[App\Http\Controllers\Receptionnistekoura::class,'index']);
Route::post('/addrecept',[App\Http\Controllers\Receptionnistekoura::class,'store']);


Route::get('/admiadd', [App\Http\Controllers\Admin\adminController::class,'index'])->name('adminadd');        
Route::post('/admiadd', [App\Http\Controllers\Admin\adminController::class,'store']);

                 