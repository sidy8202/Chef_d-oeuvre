<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\demandes;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;


class DemandesController extends Controller
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
            'type' => 'required',
            'document' => 'required|mimes:pdf|max:1000',
                         
            
        ]);

        if($ikason)
        {
            $fileName = time().'.'.$request->pdf_courriers->extension();  
                $request->document->move(public_path('carte/d_identite'), $fileName);
                $crst = demandescarte::create(
                [
                    'type'=>$request['type'],
                    'document'=>$fileName,
                ]
            );
        }
   

        return redirect('admin/courrierentrandd')->with('success', 'courrier receptionné avec succèss!!!');
    }
}
