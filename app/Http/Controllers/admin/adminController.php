<?php

namespace App\Http\Controllers\Admin;
use Illuminate\Support\Facades\Validator;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\receptionnistes;
use App\Models\admins;
use App\Models\User;

use App\Models\citoyens;

class adminController extends Controller
{

    public function index()
    {
        return view('admin.creadmin');
    }

    public function dashboard()
    {
        return view('admin.indexadmin');
    }

    public function view()
    {
        $commissaire = admins::all();      
        return view('admin.tableaudebord',compact('commissaire'));
    }

    public function create()
    {
        return view('admin.creadmin');
    }

    public function store(Request $request)
    {
        $nagnana = $request->validate(
            [

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
                        'status' => 'commissaire',
                    ]
                    
                    );

                    if($user)
                    {
                        $commissaire = admins::create(
                            [
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
                            return view('welcome');
                            

                    }
                }
     }          
}
