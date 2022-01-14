<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\DB;
use App\Models\frequesias;
use Illuminate\Http\Request;

class FrequesiasController extends Controller
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
     * @param  \App\Models\frequesias  $frequesias
     * @return \Illuminate\Http\Response
     */
    public function show(frequesias $frequesias)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\frequesias  $frequesias
     * @return \Illuminate\Http\Response
     */
    public function edit(frequesias $frequesias)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\frequesias  $frequesias
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, frequesias $frequesias)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\frequesias  $frequesias
     * @return \Illuminate\Http\Response
     */
    public function destroy(frequesias $frequesias)
    {
        //
    }


    public static function findFregById($id)
    {
        $freguesia = DB::table('freguesias')->where('id_freguesia','=',$id)->get();
        return ($freguesia);
    }
}
