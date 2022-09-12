<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'nom',
        'prenom',
        'email',
        'status',
        'password',
        'adresse',

    ];

    public function receptionnistes()
    {
        return $this->hasMany(receptionnises::class,'user_Id');
    }

    public function citoyens()
    {
        return $this->hasMany(citoyens::class,'user_Id');
    }
    public function admins()
    {
        return $this->hasMany(admins::class,'user_Id');
    }

    public function demandesci()
    {
        return $this->hasMany(demandesci::class,'user_Id');
    }

    public function demandescer()
    {
        return $this->hasMany(demandescer::class,'user_Id');
    }

    public function rendezvous()
    {
        return $this->hasMany(rendezvous::class,'user_Id');
    }

    public function daterdvci()
    {
        return $this->hasManyThrough(rendezvous::class, demandesci::class);
    }

    public function daterdvcr()
    {
        return $this->hasManyThrough(rendezvous::class, demandescer::class);
    }

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];
}
