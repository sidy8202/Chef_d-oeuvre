<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class demandesci extends Model
{
    use HasFactory;

    protected $fillable =
    [
            'objet',
            'type',
            'motifrejet',    
            'id_users',
            'status',
            'document'
    ];

    public function user()
    {
        return $this->belongsTo(User::class,'id_users');

    }

    public function rendezvous()
    {
        // return $this->belongsTo(rendezvous::class,'id_demandesci');
        return $this->belongsTo(rendezvous::class,'id_demandesci');

    }
}
