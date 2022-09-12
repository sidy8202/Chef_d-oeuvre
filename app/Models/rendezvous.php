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
        'id_users',
        'etat',
        'typedocument',
    ];

    public function demandesci()
    {
        // return $this->hasMany(demandesci::class,'id_demandesci');
        return $this->hasOne(demandesci::class, 'idrdv');

    }

    public function demandescer()
    {
        return $this->hasOne(demandescer::class,'idrdv');
    }

    public function user()
    {
        return $this->belongsTo(User::class, 'id_users');
    }
}
