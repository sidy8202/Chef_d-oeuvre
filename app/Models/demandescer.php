<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class demandescer extends Model
{
    use HasFactory;
    protected $fillable =
    [
        'objet',
        'type',
        'motifrejet',    
        'id_users',
        'document',
        'status'
    ];

    public function user()
    {
        return $this->belongsTo(User::class, 'id_users');
    }

    public function rendezvous()
    {
        return $this->belongsTo(rendezvous::class,'id_demandescer');

    }
}
