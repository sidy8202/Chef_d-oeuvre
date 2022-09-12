<?php

namespace App\Http\Controllers\receptionniste;

use App\Http\Controllers\Controller;
use App\Models\rendezvous;
use App\Models\demandescer;
use App\Models\demandesci;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class RendezvousController extends Controller

{

    public function mesrendezvous()
    {
        return view('receptionniste.mesrendezvous');
    }

    // Rdv citoyen
    public function rendezvouscitoyen()
    {
        $rdv = rendezvous:: where('etat', '=' ,'Non Retiré')->get();        
        return view('citoyen.citoyenrendezvous', compact('rdv'));
    }

    // 
    public function index()
    {
        $rdv = rendezvous:: where('etat', '=' ,'Non Retiré')->get();
        // $rdv[0]->demandesci();
                // dd($rdv[0]->demandesci());
        $retrait = rendezvous:: where('etat', '=' , 'Retiré')->get();
        return view('receptionniste.rendezvousrecep', compact('retrait','rdv'));
    }

    public function editretrait($id)
    {
        $prendre = rendezvous::findOrfail($id);
        return view('receptionniste.retraitdocument',compact('prendre'));
    }

    public function updateciretrait(Request $request,$id)
    {
        $cissan = $request->validate([                                
            'numero_document'=>['required'],
            'prix'=>['integer'],
        ]);

        if($cissan);
        {
            $abai = rendezvous::whereId($id)->update([
            'etat'=>'Retiré',
            // 'date_retrait'=>$request['date_retrait'],
            'numero_document'=>$request['numero_document'],
            'prix'=>$request['prix'],

            ]);

        }
        
        return redirect('voirlisterdv')->with('success', 'document est classé retiré!');

    }


    public function store (Request $request)
    {

        $user = Auth::User();        
        $nalido = $request->validate([

                       
            'id_demandesci'=>['required','unique:rendezvouses'],
            'daterdv' => 'required',
            'commentaires' =>'required',                      
        ]);

        if($nalido)
        {

            $user = Auth::User();            
            $ablayan = rendezvous::create(
                [
                    
                    'id_demandesci'=>$request['id_demandesci'],
                    'daterdv' => $request['daterdv'],
                    'etat' => 'Non Retiré',
                    'typedocument'=>'Ci',

                    'commentaires'=>$request['commentaires'],
                    'id_users'=>$user->id,

                    
                ]

            );
            
            $demande= demandesci::find($request['id_demandesci']);
            $demande->idrdv= $ablayan->id;
            $demande->save();

        }
        return redirect('/demandeciview')->with('success', 'date de Rendez vous effectuée avec success !!!');
 
    }

    public function confcr (Request $request)
    {
        
        $nalido = $request->validate([
            // 'id_demandescer'=>'required',
            'id_demandescer'=>['required','unique:rendezvouses'],                     
            'daterdv' => 'required',
            'commentaires' =>'required',                      
        ]);

        if($nalido)
        {
            $user = Auth::User();            
            
            $ablayan = rendezvous::create(
                [
                    
                    'id_demandescer'=>$request['id_demandescer'],
                    'daterdv' => $request['daterdv'],
                    'etat' => 'Non Retiré',
                    'typedocument'=>'Cr',
                    'commentaires'=>$request['commentaires'],
                    'id_users'=>$user->id,

                    
                ]
            );
            $demande= demandescer::find($request['id_demandescer']);
            $demande->idrdv= $ablayan->id;
            $demande->save();
        } 
        return redirect('/demandecrrecp')->with('success', 'date de Rendez vous effectuée avec success!');
 
    }
}
