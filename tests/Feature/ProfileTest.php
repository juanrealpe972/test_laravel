<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

use Illuminate\Http\UploadedFile;
use Illuminate\Support\Facades\Storage;

class ProfileTest extends TestCase
{
    /*
    Carga de archivos en Laravel con PHPUnit pero con un entorno de prueba simulado y subiendo archivos a un disco simulado.
    Una imagen de prueba se crea con el método fake() y se envía al servidor con el método image().
    Se simula el almacenamiento de la imagen en el disco local y se verifica que el archivo se haya almacenado correctamente.
    */
    public function testUpload(): void
    {
        Storage::fake('local');

        $response = $this->post('/profile', [
            'photo' => $photo = UploadedFile::fake()->image('photo.png')
        ]);

        // Assert the file was stored...
        Storage::disk('local')->assertExists("profiles/{$photo->hashName()}");

        $response->assertRedirect('/profile');
    }

    // Se verifica que el campo de la foto sea requerido.
    public function test_photo_required(): void
    {
        $response = $this->post('profile', ['photo' => '']);
        $response->assertSessionHasErrors('photo');
    }
}
