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
        $gnouman = demandescer:: where('status', '=' , 'Valider')->get();
        $rejet = demandescer:: where('status', '=' , 'Rejeter')->get();

        return view('receptionniste.listecrdemanderec' ,compact('cert','rejet','gnouman'));
    }

    public function mescertificats()
    {
        return view('receptionniste.mescertificats');
    }
    
    
    public function edit($id)
    {
        $cool = demandescer::findOrfail($id);
        return view('receptionniste.modifcert',compact('cool'));
    }

    public function update(Request $request,$id)
    {
        $cool = $request->validate([

 
            'motifrejet'=>'required'

        ]);

        if($cool);
        {
            $cool = demandescer::whereId($id)->update([
            'status'=>'Rejeter',
            'motifrejet'=>$request['motifrejet'],
            ]);
        }
        
        return redirect('demandecrrecp');

    }

    // edit pour valider la demande

    public function editvalider($id)
    {
        $cool = demandescer::findOrfail($id);
        return view('receptionniste.validercertificat',compact('cool'));
    }

    public function updatevalider(Request $request,$id)
    {
        $cool = $request->validate([

 
            'status'=>'required'

        ]);

        if($cool);
        {
            $cool = demandescer::whereId($id)->update([
            'status'=>'Valider',
            ]);
        }
        
        return redirect('demandecrrecp');

    }

    // fin edit validation

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
        return redirect('/demandecrrecp')->with('success', 'Votre demande a eté envoyée avec succèss!');
    }
}
