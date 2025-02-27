<?php

namespace Tests\Feature\Models;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;
use App\Models\User;

class UserTest extends TestCase
{
    use RefreshDatabase; // Se utiliza para que las pruebas se realicen en una base de datos de prueba.
    public function testUser(): void
    {
        // Proceso
        // Se crea un usuario manualmente con el método create() y se le asigna un email.
        User::factory()->create([
            'email' => 'juan@gmail.com'
        ]);
        
        $this->assertDatabaseHas('users', [
            'email' => 'juan@gmail.com'
        ]);

        $this->assertDatabaseMissing('users', [
            'email' => 'no@existe.com'
        ]);
    }
}
