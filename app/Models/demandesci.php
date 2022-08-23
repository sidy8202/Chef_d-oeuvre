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
            'id_users',
        'document'
    ];
}
