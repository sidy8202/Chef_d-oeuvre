<?php

namespace App\Http\Controllers\receptionniste;

use App\Http\Controllers\Controller;
use App\Models\demandesci;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class cartedidentiteController extends Controller
{
    //
    public function index()
    {        
        $niyira = demandesci:: where('status', '=' , 'En cours')->get();
        $gnouman = demandesci:: where('status', '=' , 'Valider')->get();
        $kolon = demandesci:: where('status', '=' , 'Rejetter')->get();
        return view('receptionniste.listecidemanderec',compact('niyira','gnouman','kolon'));
    }

    public function mescartesdidentites()
    {
        $user = Auth::user();
        $ayira = demandesci::where('id_users',$user->id)->orderBy('id','desc')->get();
        return view('receptionniste.mescartedidentite', compact('ayira'));
    }
 
        // Valider

    public function modif($id)
    {
        $cissan = demandesci::findOrfail($id);
        return view('receptionniste.confirmationcartedidentite',compact('cissan'));
    }

    public function updateci(Request $request, $id)
    {
        $cissan = $request->validate([

            'status'=>'required'

        ]);

        if($cissan);
        {
            $abai = demandesci::whereId($id)->update([
            'status'=>'Valider',
            
            ]);
        }
        
        return redirect('demandeciview')->with('success', 'Demande rejetée avec succèss!');
    }

    public function edit($id)
    {
        $cissan = demandesci::findOrfail($id);
        return view('receptionniste.rejetercartedidentite',compact('cissan'));
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
        
        return redirect('demandeciview')->with('success', 'Demande rejetée avec succèss!');

    }

    
    

    public function create(Request $request){
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
   
        return redirect('/demandeciview')->with('success', 'Votre demande a eté envoyée avec succèss!');
    }

    public function mescartesonly(Request $request){
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
   
        return redirect('/voirmesdemandesdeci')->with('success', 'Votre demande a eté envoyée avec succèss!');
    }
}
