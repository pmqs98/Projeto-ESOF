<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class conversas extends Model
{
    use HasFactory;
    protected $primaryKey = 'id_conversa';
    protected $fillable = [
        'id_recetor',
        'id_emissor',
        'id_anuncio',
        
    ];
}
