<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Arr;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

class MensagensSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('mensagens')->insert([
            'id_emissor' => random_int(1,3),
            'id_recetor' => random_int(1,3),
            'id_anuncio' => random_int(1,3),
            'id_conversa' => random_int(1,2),
            'texto' => Str::random(50),
            'data' => date('Y-m-d'),
            'fotos' => Str::random(50),
            'visto' => random_int(0,1)
        ]);
    }
}
