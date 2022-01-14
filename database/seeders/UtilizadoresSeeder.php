<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Arr;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

class UtilizadoresSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $array = ['M','F','O'];
        $array_telefone = [111111111, 222222222, 333333333, 444444444];
        $array_tipovendedor = ['particular', 'profissional'];
        DB::table('utilizadores')->insert([
            'nome' => Str::random(10),
            'apelido' => Str::random(10),
            'email' => Str::random(10).'@hotmail.com',
            'telefone' => Arr::random($array_telefone),
            'sexo' => Arr::random($array),
            'data_nascimento' => date('Y/m/d'),
            'tipovendedor' => Arr::random($array_tipovendedor),
            'admin' => Arr::random(0, 1),
            'password' => Hash::make('password'),
            'id_freguesia' => random_int(1, 3092),
            'foto_perfil' => Str::random(10)
        ]);
    }
}
