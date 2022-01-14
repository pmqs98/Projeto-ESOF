<?php

namespace App\Http\Controllers;

use App\Models\modelos;
use Illuminate\Http\Request;

class ModelosController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\modelos  $modelos
     * @return \Illuminate\Http\Response
     */
    public function show(modelos $modelos)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\modelos  $modelos
     * @return \Illuminate\Http\Response
     */
    public function edit(modelos $modelos)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\modelos  $modelos
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, modelos $modelos)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\modelos  $modelos
     * @return \Illuminate\Http\Response
     */
    public function destroy(modelos $modelos)
    {
        //
    }

    public static function findModeloById($id)
    {
        $modelo = modelos::orderBy('nome', 'desc')->where('id_modelo', '=', $id)->get();
        
        return ($modelo);
    }
}
