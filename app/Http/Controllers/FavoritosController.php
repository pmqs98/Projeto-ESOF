<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use App\Models\Favoritos;
use DB;

class FavoritosController extends Controller
{
    public function store(Request $request)
    {
        $request->validate([
            'id_utilizador' => ['required', 'int', 'max:255'],
            'id_anuncio' => ['required', 'int', 'max:255'],
        ]);

        $data = $request->all();
        $t = favoritos::create($data);

        return redirect('/anuncios/show/' . $t->id_anuncio);
    }

    public static function findAnunciosById($id)
    {
        $anuncios = favoritos::orderBy('created_at', 'desc')->where('id_utilizador', '=', $id)->get();
        return ($anuncios);
    }

    public static function countFavoritos($id)
    {



        $mensagens = DB::table('favoritos')
            ->select()
            ->where('id_anuncio', '=', $id)
            ->count();




        return ($mensagens);
    }

    public function remove(request $favorito)
    {
        $remove = favoritos::where('id_anuncio', $favorito->id_anuncio)
            ->where('id_utilizador', Auth::user()->id)
            ->delete();


        return redirect('/dashboard/favoritos');
    }
}
