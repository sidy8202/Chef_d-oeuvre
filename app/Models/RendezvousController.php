<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class RendezvousController extends Model
{
    use HasFactory;

    protected $fillable =
    [
        'daterdv',
        'commentaires',    
        'id_users',
        'id_demandescer',
        'id_demandesci',
        'etat'
    ];

   
}


