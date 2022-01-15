<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class AnunciosTest extends TestCase
{
    /**
     * A basic feature test example.
     *
     * @return void
     */
    public function test_can_reach_anuncios_page()
    {
        $response = $this->get('/cars');

        $response->assertStatus(200)->assertViewIs('layouts.cars');
    }

    public function test_can_filter_anuncios()
    {
        $filter = [
            'marca' => '3',
            'condicao' => '',
            'quilometragem' => '',
            'combustivel' => '',
            'cor' => '',
            'preco' => '',
        ];

        $this->get('/cars', $filter)
            ->assertSuccessful()
            ->assertSee('Audi TT RS')
            ->assertDontSee('Seat Ibiza PD');
    }

    public function test_can_reach_create_anuncios_page()
    {
        $response = $this->get('/product');

        $response->assertStatus(302);
    }

    public function test_can_create_anuncio()
    {
        $data = [
            'titulo' => 'teste',
            'descricao' => 'teste',
            'id_marca' => '3',
            'id_modelo' => '1',
            'preco' => 20000,
            'valor_fixo' => 1,
            'data_registo' => '2019-10-10',
            'cor' => 'amarelo',
            'estado' => 0,
            'versao' => 'teste',
            'combustivel' => 'gasolina',
            'quilometragem' => 0,
            'potencia' => 700,
            'cilindrada' => 500,
            'retoma' => 0,
            'financiamento' => 0,
            'segmento' => 'teste',
            'metalizado' => 1,
            'caixa' => 6,
            'lotacao' => 2,
            'portas' => 2,
            'classe_veiculo' => 'teste',
            'garantia_stand' => 1,
            'nr_registos' => 0,
            'tracao' => 'teste',
            'livro_revisoes' => 1,
            'seg_chave' => 1,
            'jantes_liga_leve' => 1,
            'estofos' => 'teste',
            'medida_jantes' => 17,
            'airbags' => 1,
            'importado' => 1
        ];

        $this->get('/product', $data)
            ->assertSessionHasNoErrors()
            ->assertStatus(302);
    }
}
