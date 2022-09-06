<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class rendezvous extends Model
{
    use HasFactory;
    protected $fillable =
    [       			
        'commentaires',
        'daterdv',
        'id_demandesci',
        'id_demandescer',
    ];

    public function demandesci()
    {
        return $this->hasMany(demandesci::class,'id_demandesci');

    }

    public function demandescer()
    {
        return $this->hasMany(demandescer::class,'id_demandescer');

    }
}
