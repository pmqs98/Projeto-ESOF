<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ConversasController extends Controller
{
    
    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'id_recetor' => ['required', 'int', 'max:255'],
            'id_anuncio' => ['required', 'int', 'max:255'],
        ]);
        
        $data = $request ->all();
        $data['id_emissor'] = Auth::user()->id;
        
        $t = conversas::create($data);

 
        return redirect('/dashboard/mensagens');
    }
}
