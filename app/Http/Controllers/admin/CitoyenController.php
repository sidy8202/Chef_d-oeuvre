<?php

namespace App\Http\Controllers\Admin;
use Illuminate\Support\Facades\Validator;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\receptionnistes;
use App\Models\admins;
use App\Models\User;

use App\Models\citoyens;
use App\Models\demandescer;
use App\Models\demandesci;
use Illuminate\Support\Facades\Auth;

class CitoyenController extends Controller
{

    public function dashboard()
    {
        $user = Auth::user();
        $ayira = demandesci::where('id_users',$user->id)->orderBy('id','desc')->get();
        $nanaye = demandescer::where('id_users',$user->id)->orderBy('id','desc')->get();
        
        return view('citoyen.dashboard', compact('user','ayira','nanaye'));
    }
    public function index()
    {
        return view('welcome');
    }

    public function updateprofile()
    {
        $user = User:: all();
        return view('citoyen.modifierprofil', compact('user'));
    }

    public function store(Request $request)
    {
        $nagnana = $request->validate(
            [

                'profile_img' => 'required|mimes:png,jpg,jpeg|max:1000',
                'nom'=>['required','string','max:225'],
                'prenom'=>['required','string','max:225'],                
                'adresse'=>['required','string','max:225'],
                'email'=>['required','string','email','max:50','unique:users'],
                'username'=>['required','string','max:225'],
                'phone'=>['required','string','max:50'],                
                'password'=>['required','string','min:5','confirmed']
               
            ]
            );

            if($nagnana)
            {
                
                $user =  User::create(
                    [
                        'nom' => $request['nom'],
                        'prenom' => $request['prenom'],
                        'email' =>$request['email'],
                        'adresse' =>$request['adresse'],
                        'password' => bcrypt($request['password']),
                        'status' => 'citoyen',
                    ]
                    
                    );

                    if($user)
                    {
                        $fileName = time().'.'.$request->profile_img->extension();  
                        $request->profile_img->move(public_path('profile/citoyens'), $fileName);
                        $citoyen = citoyens::create(
                            [
                                'profile_img'=>$fileName,
                                'id_users' => $user->id,
                                'nom'=>$request['nom'],
                                'prenom'=>$request['prenom'],
                                'adresse'=>$request['adresse'],
                                'phone'=>$request['phone'],                                                              
                                'email'=>$request['email'],
                                'username'=>$request['username'],
                                'password' => bcrypt($request['password']),

                            ]
                            );                          
                            return redirect('/')->with('success', 'Félicitations très chèr(e) citoyen votre compte a été crée avec success !!');
                            

                    }
                }
     }   
     
    //  Ajout citoyen cote receptionniste

    public function ajoutcitoyens(Request $request)
    {
        $nagnana = $request->validate(
            [

                'profile_img' => 'required|mimes:png,jpg,jpeg|max:1000',
                'nom'=>['required','string','max:225'],
                'prenom'=>['required','string','max:225'],                
                'adresse'=>['required','string','max:225'],
                'email'=>['required','string','email','max:50','unique:users'],
                'username'=>['required','string','max:225'],
                'phone'=>['required','string','max:50'],                
                'password'=>['required','string','min:5','confirmed']
               
            ]
            );

            if($nagnana)
            {
                
                $user =  User::create(
                    [
                        'nom' => $request['nom'],
                        'prenom' => $request['prenom'],
                        'email' =>$request['email'],
                        'password' => bcrypt($request['password']),
                        'status' => 'citoyen',
                    ]
                    
                    );

                    if($user)
                    {
                        $fileName = time().'.'.$request->profile_img->extension();  
                        $request->profile_img->move(public_path('profile/citoyens'), $fileName);
                        $citoyen = citoyens::create(
                            [
                                'profile_img'=>$fileName,
                                'id_users' => $user->id,
                                'nom'=>$request['nom'],
                                'prenom'=>$request['prenom'],
                                'adresse'=>$request['adresse'],
                                'phone'=>$request['phone'],                                                              
                                'email'=>$request['email'],
                                'username'=>$request['username'],
                                'password' => bcrypt($request['password']),

                            ]
                            );                          
                            return redirect('/citoyenslistes')->with('success', 'Compte citoyen crée avec success !!');
                            

                    }
                }
     }        

    // End ajout
}
