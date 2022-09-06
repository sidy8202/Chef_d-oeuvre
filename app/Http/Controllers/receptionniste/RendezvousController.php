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
    public function index()
    {
        $carte = demandesci:: where('status', '=' , 'En cours')->get();
        $certificat = demandescer:: where('status', '=' , 'En cours')->get();
        $rdv = rendezvous::all();
        return view('receptionniste.rendezvousrecep', compact('carte','certificat','rdv'));
    }

    public function editretrait($id)
    {
        $prendre = rendezvous::findOrfail($id);
        return view('receptionniste.retraitdocument',compact('prendre'));
    }

    public function update(Request $request,$id)
    {
        $cissan = $request->validate([
 
            'motifrejet'=>'required'

        ]);

        if($cissan);
        {
            $abai = demandesci::whereId($id)->update([
            'status'=>'Rejetter',
            'motifrejet'=>$request['motifrejet'],
            ]);
        }
        
        return redirect('demandeciview')->with('success', 'Demande rejetée avec succèss!!!');

    }


    public function store (Request $request)
    {
        
        $nalido = $request->validate([

                       
            'id_demandesci'=>['required','unique:rendevouses'],
            'daterdv' => 'required',
            'commentaires' =>'required',                      
        ]);

        if($nalido)
        {
            
            $ablayan = rendezvous::create(
                [
                    
                    'id_demandesci'=>$request['id_demandesci'],
                    'daterdv' => $request['daterdv'],
                    'etat' => 'Non Retiré',

                    'commentaires'=>$request['commentaires']
                    
                ]
            );
        }
        return redirect('/demandeciview')->with('success', 'date de Rendez vous effectuée avec success !!!');
 
    }

    public function confcr (Request $request)
    {
        
        $nalido = $request->validate([
            // 'id_demandescer'=>'required',
            'id_demandescer'=>['required','unique:rendevouses'],                     
            'daterdv' => 'required',
            'commentaires' =>'required',                      
        ]);

        if($nalido)
        {
            
            $ablayan = rendezvous::create(
                [
                    
                    'id_demandescer'=>$request['id_demandescer'],
                    'daterdv' => $request['daterdv'],
                    'etat' => 'Non Retiré',
                    'commentaires'=>$request['commentaires']
                    
                ]
            );
        } 
        return redirect('/demandecrrecp')->with('success', 'date de Rendez vous effectuée avec success !!!');
 
    }
}
