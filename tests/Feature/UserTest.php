<?php

namespace Tests\Feature;

use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;
use Illuminate\Foundation\Testing\WithoutMiddleware;
use Tests\Feature\factory;

class UserTest extends TestCase
{
    /**
     * A basic feature test example.
     */

    use RefreshDatabase;

    public function test_example(): void
    {
        $response = $this->get('/');

        $response->assertStatus(200);
    }

    public function test_usuariox_rutay(){

        $user = User::create([
            'name' => 'John Doe',
            'email' => 'john@example.com',
            'password' => bcrypt('password123'), // Asegúrate de encriptar la contraseña
        ]);
        

        $response = $this->actingAs($user)
            ->get('/autosrobados');

        $response->assertStatus(200);
        $response->assertSeeText('Comprueba el status de tu auto');
    }
}
