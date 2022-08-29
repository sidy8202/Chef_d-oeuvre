<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class citoyens extends Model
{
    use HasFactory;

    protected $fillable=
    [
        'nom',
        'prenom',
        'adresse',
        'phone',	
        'email',	
        'username',
        'profile_img',
        'password',
        'id_users'
    ];
    
    public function users()
    {
        return $this->belongsTo(User::class,'id_users');

    }
}
