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
    Route::get('/citoyenslistes',[\App\Http\Controllers\Admin\ReceptionnisteController::class,'listecitoyens'])->name('voirtouslescitoyens');
     

    Route::get('/citoyenadd', [App\Http\Controllers\Admin\CitoyenController::class,'index']); 
    Route::get('/citoyen-profil', [App\Http\Controllers\Admin\CitoyenController::class,'updateprofile'])->name('modifierprofil');       
    Route::post('/citoyenadd', [App\Http\Controllers\Admin\CitoyenController::class,'store'])->name('ajoutcitoyensstore');
    Route::post('/citoyenaddinside', [App\Http\Controllers\Admin\CitoyenController::class,'ajoutcitoyens'])->name('addcitoyeninside');


});

Route::prefix('receptionniste')->group(function() { 

});

Route::prefix('citoyen')->group(function() { 
    Route::get('/dashboard', [App\Http\Controllers\Admin\CitoyenController::class,'dashboard'])->name('citoikadash');  

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
    // Route::get('/demandecirecp',[App\Http\Controllers\receptionniste\Demandecirep::class,'index'])->name('demandecartecpstore');
    Route::post('/demandecoura', [\App\Http\Controllers\receptionniste\cartedidentiteController::class, 'create'])->name('carte.create'); 
    Route::get('/demandeciview', [\App\Http\Controllers\receptionniste\cartedidentiteController::class, 'index'])->name('carteciaffichage'); 
    Route::get('/demanderejetci/{id}', [\App\Http\Controllers\receptionniste\cartedidentiteController::class, 'edit'])->name('carterejeter'); 
    Route::patch('/demanderejetci/update/{id}', [\App\Http\Controllers\receptionniste\cartedidentiteController::class, 'update'])->name('cartedidentiterejet'); 
    Route::get('/demandereciconfirmation/modifci/{id}', [\App\Http\Controllers\receptionniste\cartedidentiteController::class, 'modif'])->name('confirmerdossier'); 
    Route::patch('/demandereciconfirm/update/{id}', [\App\Http\Controllers\receptionniste\cartedidentiteController::class, 'updateci'])->name('miseajourdossier'); 
    Route::get('/voirmesdemandesdeci', [\App\Http\Controllers\receptionniste\cartedidentiteController::class, 'mescartesdidentites'])->name('myowndemandesci');
    Route::post('/sendmesdemandesdeci', [\App\Http\Controllers\receptionniste\cartedidentiteController::class, 'mescartesonly'])->name('onlyrecpdemandeci');




    Route::get('/demanderejet/{id}',[\App\Http\Controllers\receptionniste\Demandescertif::class,'edit'])->name('certerejet');
    Route::patch('/demanderejet/update/{id}',[\App\Http\Controllers\receptionniste\Demandescertif::class,'update'])->name('certerejetupd');
    Route::get('/demandevalider/{id}',[\App\Http\Controllers\receptionniste\Demandescertif::class,'editvalider'])->name('editerforvalider');
    Route::patch('/demandevalider/update/{id}',[\App\Http\Controllers\receptionniste\Demandescertif::class,'updatevalider'])->name('editforupdatevalider');
    Route::get('/demandecrrecp',[App\Http\Controllers\receptionniste\Demandescertif::class,'index'])->name('listecerdemandes');
    Route::post('/listedemandecarte',[App\Http\Controllers\receptionniste\Demandescertif::class,'store'])->name('demandecerrecpstore'); 

    // Route pour les rendez vous cote receootionniste
    Route::get('/voirlisterdv',[App\Http\Controllers\receptionniste\RendezvousController::class,'index'])->name('voirlisterdv');
    
    Route::post('/confirmdemande',[App\Http\Controllers\receptionniste\RendezvousController::class,'store'])->name('confirmdemandeci');
    Route::post('/confirmdemandecr',[App\Http\Controllers\receptionniste\RendezvousController::class,'confcr'])->name('confirmdemandecr');
    Route::get('/voirretrait/edit/{id}',[App\Http\Controllers\receptionniste\RendezvousController::class,'editretrait'])->name('documentminai');
    Route::patch('/ciretrait/update/{id}',[App\Http\Controllers\receptionniste\RendezvousController::class,'updateciretrait'])->name('retraicartedientite');
    Route::get('/voirrdvdevcitoyen',[App\Http\Controllers\receptionniste\RendezvousController::class,'rendezvouscitoyen'])->name('rdvducitoyen');




    // Route::post('/demandecitchi',[App\Http\Controllers\receptionniste\Demandecirep::class,'nextstore'])->name('ok') ;
    // Route::post('/listedemandecarte',[App\Http\Controllers\receptionniste\Demandecirep::class,'nextstore'])->name('demandecidentitestore');
    // Route::post('/listecerdemande', [App\Http\Controllers\Demandescerti::class,'store'])->name('listecidemande');
    // Route::post('/listedemandecarte',[App\Http\Controllers\receptionniste\Demandecirep::class,'store'])->name('demandecartecpstore');





       
    
    
    // End //


Route::get('/addrecept',[App\Http\Controllers\Receptionnistekoura::class,'index'])->name('ajouterreceptionniste');
Route::post('/addrecept',[App\Http\Controllers\Receptionnistekoura::class,'store']);


Route::get('/admiadd', [App\Http\Controllers\Admin\adminController::class,'index'])->name('adminadd');        
Route::post('/admiadd', [App\Http\Controllers\Admin\adminController::class,'store']);

                 