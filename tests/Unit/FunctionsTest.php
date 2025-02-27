<?php

namespace Tests\Unit;

use PHPUnit\Framework\TestCase;

class FunctionsTest extends TestCase
{
    public function test_email(): void
    {
        $result = validate_email("juan@admin.com");
        $this->assertTrue($result);

        $result = validate_email("juan@@admin.com");
        $this->assertFalse($result);
    }
}
