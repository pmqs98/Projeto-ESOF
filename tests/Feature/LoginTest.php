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

        $response->assertStatus(200)
            ->assertViewIs('auth.login');
    }

    public function test_user_can_login_if_registered()
    {
        $credentials = [
            'email' => 'teste@hotmail.com', 
            'password' => 'qwertyui'
        ];
        $this->post('/login', $credentials)
            ->assertSessionHasNoErrors();
    }

    public function test_user_can_login_if_not_registered()
    {
        $credentials = [
            'email' => '123@hotmail.com', 
            'password' => '123456789'
        ];
        $credentials2 = [
            'email' => '', 
            'password' => ''
        ];

        $this->post('/login', $credentials)
            ->assertSessionHasErrors();

        $this->post('/login', $credentials2)
            ->assertSessionHasErrors();
    }
}
