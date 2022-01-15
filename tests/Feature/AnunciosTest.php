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
}
