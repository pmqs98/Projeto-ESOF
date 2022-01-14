<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class mensagens extends Model
{
    use HasFactory;
    protected $primaryKey = 'id_mensagem';
    protected $fillable = [
        'texto',
        'id_recetor',
        'id_emissor',
        'id_anuncio',
        'id_conversa',
        'data',
        'fotos',
        'visto',
    ];


}
