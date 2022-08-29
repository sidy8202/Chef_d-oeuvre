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
        $cert = demandescer::all();
        return view('receptionniste.listecrdemanderec' ,compact('cert'));
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
