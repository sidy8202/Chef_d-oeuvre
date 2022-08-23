<?php

namespace App\Http\Controllers;

use App\Models\demandescarte as ModelsDemandescarte;
use App\Models\demandesci;
use Illuminate\Http\Request;

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;


class Demandescarte extends Controller
{
    public function index()
    {
        return view('listecidemande');
    }

    public function viewcr()
    {
        return view('listecrdemandes');
    }

    public function store (Request $request)
    {
        $user = Auth::User();
        $ikason = $request->validate([
            
            'type'=>'required',
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
                    'type'=>$request['type'],
                    'objet'=>$request['objet'],
                    'id_users'=>$user->id,
                    
                ]
            );
        }
   
        return redirect('listecidemande')->with('success', 'courrier receptionné avec succèss!!!');
    }
   
}
