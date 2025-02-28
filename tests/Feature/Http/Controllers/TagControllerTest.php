<?php

namespace Tests\Feature\Http\Controllers;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

use App\Models\Tag;

class TagControllerTest extends TestCase
{
    use RefreshDatabase;
    // función para probar el registro de una etiqueta
    public function testStore(): void
    {
        $this
            ->post('tags', ['name' => 'PHP'])
            ->assertRedirect('/');

        $this->assertDatabaseHas('tags', ['name' => 'PHP']);
    }

    // función para probar la eliminación de una etiqueta
    public function testDestroy(): void
    {
        $tag = Tag::factory()->create();

        $this
            ->delete("tags/{$tag->id}")
            ->assertRedirect('/');

        $this->assertDatabaseMissing('tags', ['name' => $tag->name]);
    }

    public function testStoreValidation(): void
    {
        $this
            ->post('tags', ['name' => ''])
            ->assertSessionHasErrors('name');
    }
}
