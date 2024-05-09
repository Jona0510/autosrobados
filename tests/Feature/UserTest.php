<?php

namespace Tests\Feature;

use App\Models\Autosrobado;
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
    

    public function test_post_creacion_registro(){

        $user = User::create([
            'name' => 'Fernando',
            'email' => 'Fernando@example.com',
            'password' => bcrypt('password123'), // Asegúrate de encriptar la contraseña
        ]);
        

        $response = $this->actingAs($user)
        ->post('/autosrobados', [
            'marca' => 'Nissan',
            'modelo' => 'Sentra',
            'fecha_robo' => '2021-09-01',
            'estatus' => 'Robado',
            'correo' => 'jonh@gmail.com',
            'user_id' => $user->id,
        ]);

        $response->assertStatus(302);
        $this->assertDatabaseHas('autosrobados', [
            'marca' => 'Nissan',
            'modelo' => 'Sentra',
            'fecha_robo' => '2021-09-01',
            'estatus' => 'Robado',
            'user_id' => $user->id,
        ]);
        $response->assertRedirect('/autosrobados/1/ubicacion');
        
    }
    
    public function test_informacion_incorrecta(){

        $user = User::create([
            'name' => 'Luis Doe',
            'email' => 'Luis@example.com',
            'password' => bcrypt('password123'), // Asegúrate de encriptar la contraseña
        ]);
        

        $response = $this->actingAs($user)
        ->post('/autosrobados', [
            'marca' => '',
            'modelo' => '',
            'fecha_robo' => '',
            'estatus' => '',
            'correo' => ' ',
            'user_id' => $user->id,
        ]);

        $response->assertStatus(302);
    
        $response->assertInvalid([
            'marca' => 'The marca field is required.',
            'modelo' => 'The modelo field is required.',
            'fecha_robo' => 'The fecha robo field is required.',
            'estatus'  => 'The estatus field is required.',
            'correo' => 'The correo field is required.',
        ]);
    }


}
