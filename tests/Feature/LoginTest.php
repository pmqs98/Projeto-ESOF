<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class LoginTest extends TestCase
{
    /**
     * A basic feature test example.
     *
     * @return void
     */
    public function test_can_reach_login_page()
    {
        $response = $this->get('/login');

        $response->assertStatus(200)->assertViewIs('auth.login');
    }

    /*public function test_can_register_a_user()
    {
        $credentials = ['nome' => 'Joao','apelido' => 'Santos', 'email' => '123@gmail.com', 'telefone' => 123556789, 'sexo' => 'M', 'data_nascimento' => '2020-10-10', 'tipovendedor' => 'profissional', 'admin' => 1, 'password' => 'testepassword', 'id_freguesia' => '45'];
        $this->post('/register', $credentials)
            ->assertSessionHasNoErrors()
            ->assertStatus(201);
    }*/
    
    public function test_user_can_login_if_registered()
    {
        $credentials = ['email' => 'teste@hotmail.com', 'password' => 'qwertyui'];
        $this->post('/login', $credentials)
            ->assertSessionHasNoErrors();
    }

    public function test_user_can_login_if_not_registered()
    {
        $credentials = ['email' => '', 'password' => ''];
        $this->post('/login', $credentials)
            ->assertSessionHasErrors();
    }
}
