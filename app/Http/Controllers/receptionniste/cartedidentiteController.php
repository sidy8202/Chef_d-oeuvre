<?php

namespace App\Http\Controllers\receptionniste;

use App\Http\Controllers\Controller;
use App\Models\demandesci;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class cartedidentiteController extends Controller
{
    //
    public function index(){

        $abeyira = demandesci::all();
        return view('receptionniste.listecidemanderec',compact('abeyiara'));
    }

    public function create(Request $request){
        $user = Auth::User();
        $ikason = $request->validate([
            
           
            'objet'=>'required',
            'document' => 'required|mimes:pdf|max:1000',
                                    
        ]);

        if($ikason)
        {
            $fileName = time().'.'.$request->document->extension();  
            $request->document->move(public_path('carte/d_identite'), $fileName);

            $user = Auth::User();
            
            $cissan = demandesci::create(
                [
                    'document'=>$fileName,
                    'type' => 'carte d_identite',
                    'status' => 'En cours',
                    'objet'=>$request['objet'],
                    'id_users'=>$user->id,
                    
                ]
            );
        }
   
        return redirect('/demandecirecp')->with('success', 'Votre demande a eté envoyée avec succèss!!!');
    }
}
