<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Favoritos extends Model
{
    use HasFactory;
    protected $primaryKey = 'id_favorito';
    protected $fillable = [
        'id_anuncio',
        'id_utilizador',
        
    ];
}
