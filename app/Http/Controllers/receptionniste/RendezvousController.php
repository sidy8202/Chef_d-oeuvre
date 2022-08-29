<?php

namespace App\Http\Controllers\receptionniste;

use App\Http\Controllers\Controller;
use App\Models\rendezvous;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class RendezvousController extends Controller
{
    public function index()
    {
        return view();
    }

    public function store (Request $request)
    {
        
        $nalido = $request->validate([
                       
            'id_demandesci'=>'required',
            'daterdv' => 'required',
             'commentaires' =>'required',                      
        ]);

        if($nalido)
        {
            
            $ablayan = rendezvous::create(
                [
                    
                    'id_demandesci'=>$request['id_demandesci'],
                    'daterdv' => $request['daterdv'],
                    'commentaires'=>$request['commentaires']
                    
                ]
            );
        }
        return redirect('/demandecirecp')->with('success', 'date de Rendez vous effectuée avec success !!!');
 
    }

    public function confcr (Request $request)
    {
        
        $nalido = $request->validate([
                       
            'id_demandescer'=>'required',
            'daterdv' => 'required',
             'commentaires' =>'required',                      
        ]);

        if($nalido)
        {
            
            $ablayan = rendezvous::create(
                [
                    
                    'id_demandescer'=>$request['id_demandescer'],
                    'daterdv' => $request['daterdv'],
                    'commentaires'=>$request['commentaires']
                    
                ]
            );
        } 
        return redirect('/demandecrrecp')->with('success', 'date de Rendez vous effectuée avec success !!!');
 
    }
}
