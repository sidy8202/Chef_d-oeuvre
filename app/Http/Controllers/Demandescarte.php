<?php

namespace App\Http\Controllers;

use App\Models\demandescarte as ModelsDemandescarte;
use App\Models\demandesci;
use App\Models\rendezvous;
use Illuminate\Http\Request;

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;


class Demandescarte extends Controller
{
    public function index()
    {   
        $user = Auth::user();
        $ayira = demandesci::where('id_users',$user->id)->orderBy('id','desc')->get();
        $demandeval= demandesci::where('status', '=', 'Valider')->get();
        $demanderej= demandesci::where('status', '=', 'Rejeter')->get();
    
        return view('citoyen.listecidemande',compact('user','ayira','demandeval','demanderej'));
    }

    // public function viewcr()
    // {
    //     return view('citoyen.listecrdemandes');
    // }

    public function store (Request $request)
    {
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
   
        return redirect('listecidemande')->with('success', 'Votre demande a eté envoyée avec succèss!');
    }
   
}
