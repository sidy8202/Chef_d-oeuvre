<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\receptionnistes;
use App\Models\User;

class Receptionnistekoura extends Controller
{

    public function index ()
    {
        $receptionniste= receptionnistes::all();
        return view('receptionniste.crerecp', compact('receptionniste'));
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
                        'password' => bcrypt($request['password']),
                        'status' => 'receptionniste',
                    ]
                    
                    );

                    if($user)
                    {
                        $fileName = time().'.'.$request->profile_img->extension();  
                        $request->profile_img->move(public_path('profile/receptionnistes'), $fileName);
                        $receptionniste = receptionnistes::create(
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
                            return view('receptionniste.crerecp');
                            
                    }
                }
     }         
}
