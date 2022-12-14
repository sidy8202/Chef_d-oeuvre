<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\demandescer;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;
class Demandescerti extends Controller
{
    public function index()
    {
        $user = Auth::user();
        // $ayira = demandesci::where('id_users',$user->id)->orderBy('id','desc')->get();
        
        // return view('citoyen.listecidemande',compact('user','ayira'));
        $nanaye = demandescer::where('id_users',$user->id)->orderBy('id','desc')->get();
        return view('citoyen.listecrdemandes', compact('user','nanaye'));
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
       return redirect('citoyen.listecrdemandes')->with('success', 'Demande envoyée avec succès!!!!');
    }
}
