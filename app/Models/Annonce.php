<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Annonce extends Model
{
    use HasFactory;
    use SoftDeletes;

    protected $fillable = [
        'user_id',
        'titre',
        'description',
        'pays',
        'ville',
        'prix',
        'equipements',
        'disponible_du',
        'disponible_au',
        'images',
    ];

    protected $casts = [
        'equipements' => 'array',
        'disponible_du' => 'date',
        'disponible_au' => 'date',
        'prix' => 'decimal:2',
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
