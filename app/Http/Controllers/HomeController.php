<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Models\receptionnistes;
use App\Models\admins;
use App\Models\User;
use App\Models\citoyens;
use App\Models\demandescer;
use App\Models\demandesci;
use App\Models\rendezvous;
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

                $niyira = demandesci:: where('status', '=' , 'En cours')->get();
                
                $ayira = demandesci::all();
                $nanayé = demandescer::all();
                $malidew = User::all();
                $retrait = rendezvous:: where('etat', '=' , 'Retiré')->get();

                $receptionniste = receptionnistes::where ('id_users', $user->id)->first();
                return view ('receptionniste.dashboard',compact('receptionniste','niyira','ayira','nanayé','malidew','retrait'));
            }

            elseif($user->status == 'citoyen')
            {
                $citoyen = citoyens::where ('id_users', $user->id)->first();
                $ayira = demandesci::where('id_users',$user->id)->orderBy('id','desc')->get();
                $nanaye = demandescer::where('id_users',$user->id)->orderBy('id','desc')->get();
                return view ('citoyen.dashboard',compact('citoyen','ayira','nanaye'));
            }
            
            else
            {
            return view('home');  
            }   
        }
}
