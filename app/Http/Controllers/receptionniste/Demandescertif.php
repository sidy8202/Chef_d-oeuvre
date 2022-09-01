<?php

namespace App\Http\Controllers\receptionniste;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\demandescer;
use Illuminate\Support\Facades\Auth;

class Demandescertif extends Controller
{
    public function index()
    {
        $cert = demandescer:: where('status', '=' , 'En cours')->get();
        $rejet = demandescer:: where('status', '=' , 'Rejetter')->get();

        return view('receptionniste.listecrdemanderec' ,compact('cert','rejet'));
    }

    
    public function edit($id)
    {
        $abai = demandescer::findOrfail($id);
        return view('receptionniste.modifcert',compact('abai'));
    }

    public function update(Request $request,$id)
    {
        $abai = $request->validate([

 
            'motifrejet'=>'required'

        ]);

        if($abai);
        {
            $abai = demandescer::whereId($id)->update([
            'status'=>'Rejetter',
            'motifrejet'=>$request['motifrejet'],
            ]);
        }
        
        return redirect('demandecrrecp');

    }

    public function store(Request $request)
    {
        $user = Auth::User();
        $nikai = $request->validate([
            
            
            'objet'=>'required',
            'document' => 'required|mimes:pdf|max:1000',
                                    
        ]);

        if($nikai)
        {
            $fileName = time().'.'.$request->document->extension();  
            $request->document->move(public_path('certi/residencee'), $fileName);

            $user = Auth::User();
            
            $cissan = demandescer::create(
                [
                    'document'=>$fileName,
                    'type' => 'certificat de residence',
                    'status' => 'En cours',
                    'objet'=>$request['objet'],
                    'id_users'=>$user->id,
                    
                ]
            );
        }
        return redirect('/demandecrrecp')->with('success', 'Votre demande a eté envoyée avec succèss!!!');
    }
}
