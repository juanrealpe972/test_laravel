<?php

namespace Tests\Unit\Models;

use App\Models\Post;
use PHPUnit\Framework\TestCase;

class PostTest extends TestCase
{
    // Mutators
    public function test_set_name_in_lowercase(): void
    {
        $post = new Post;
        $post->name = 'Proyecto en Laravel';

        $this->assertEquals('proyecto en laravel', $post->name);
    }

    // Accessors
    public function test_get_slug(): void
    {
        $post = new Post;
        $post->name = 'Proyecto en Laravel';

        $this->assertEquals('proyecto-en-laravel', $post->slug);
    }

    // Methods personalized
    public function test_get_href(): void
    {
        $post = new Post;
        $post->name = 'Proyecto en Laravel';

        $this->assertEquals('blog/proyecto-en-laravel', $post->href());
    }
}
