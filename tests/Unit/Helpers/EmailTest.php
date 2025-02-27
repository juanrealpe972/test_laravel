<?php

namespace Tests\Unit\Helpers;

use App\Helpers\Email;
use PHPUnit\Framework\TestCase;

class EmailTest extends TestCase
{
    public function testEmail(): void
    {
        /* Se puede hacer de esta forma. Pero se recomienda crear una clase para hacer la validación (App\Helpers\Email).
            $email = "juan@admin.com";
            $result = boolval(filter_var($email, FILTER_VALIDATE_EMAIL));
        */

        $result = Email::validate("juan@admin.com");
        $this->assertTrue($result);
        $result = Email::validate("juan@@admin.com"); // email no valido.
        $this->assertFalse($result); // Se espera que sea falso ya que el email no es valido.
    }
}
