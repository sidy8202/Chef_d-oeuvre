<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Models\receptionnistes;
use App\Models\admins;
use App\Models\User;
use App\Models\citoyens;
use App\Models\demandesci;
use Illuminate\Support\Facades\Auth;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
  

    public function index()
        {
            $user = Auth::user();
        
            if($user->status == 'commissaire')
            {
                $commissaire = admins::where ('id_users', $user->id)->first();
                return view ('admin.tableaudebord',compact('commissaire'));
            }

            elseif($user->status == 'receptionniste')
            {
                $receptionniste = receptionnistes::where ('id_users', $user->id)->first();
                return view ('receptionniste.dashboard',compact('receptionniste'));
            }

            elseif($user->status == 'citoyen')
            {
                $ayira = demandesci::where('id_users',$user->id)->orderBy('id','desc')->get();
                $citoyen = citoyens::where ('id_users', $user->id)->first();
                return view ('citoyen.dashboard',compact('citoyen','ayira'));
            }
            
            else
            {
            return view('home');  
            }   
        }
}
