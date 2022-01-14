<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Arr;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

class AnunciosSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $foto = Str::random(10);
        Db::table('anuncios')->insert([
            'id_utilizador' => random_int(1, 3),
            'descricao' => Str::random(90),
            'titulo' => Str::random(10),
            'valor_fixo' => random_int(0, 1),
            'preco' => random_int(1000, 100000),
            'id_modelo' => random_int(1, 654),
            'id_marca' => random_int(1, 54),
            'cor' => Str::random(10),
            'data_registo' => date('Y-m-d'),
            'estado' => random_int(0,1),
            'versao' => Str::random(10),
            'combustivel' => Str::random(10),
            'quilometragem' => random_int(0, 1000000),
            'potencia' => random_int(50, 1000),
            'cilindrada' => random_int(100, 5000),
            'retoma' => random_int(0,1),
            'financiamento' => random_int(0,1),
            'segmento' => Str::random(10),
            'metalizado' => random_int(0,1),
            'caixa' => random_int(0,1),
            'lotacao' => random_int(2,9),
            'destacado' => random_int(0,1),
            'portas' => random_int(3,5),
            'classe_veiculo' => Str::random(10),
            'tracao' => Str::random(10),
            'garantia_stand' => random_int(0,1),
            'nr_registos' => random_int(1,5),
            'livro_revisoes' => random_int(0,1),
            'seg_chave' => random_int(0,1),
            'jantes_liga_leve' => random_int(0,1),
            'estofos' => Str::random(10),
            'medida_jantes' => random_int(7,12),
            'airbags' => random_int(0,1),
            'ar_condicionado' => random_int(0,1),
            'importado' => random_int(0,1),
            'disponivel' => random_int(0,1),
            'fotos' => $foto,
            'foto_perfil' => $foto,
        ]);
    }
}
