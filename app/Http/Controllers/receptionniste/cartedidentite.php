<?php

namespace App\Http\Controllers\receptionniste;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\demandesci;
use Illuminate\Support\Facades\Auth;

class cartedidentite extends Controller
{

    public function index()
    {
        // $user = Auth::user();
        // $ayira = demandesci::where('id_users',$user->id)->orderBy('id','desc')->get();
        $ayira = demandesci::all();
        return view('receptionniste.listecidemanderec',compact('ayira'));
    }

    public function store(Request $request)
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
   
        return redirect('/demandecirecp')->with('success', 'Votre demande a eté envoyée avec succèss!!!');
    }

}
