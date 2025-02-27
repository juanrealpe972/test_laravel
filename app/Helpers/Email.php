<?php

namespace App\Helpers;

class Email
{
    public static function validate($email)
    {
        return boolval(filter_var($email, FILTER_VALIDATE_EMAIL));
    }
}

?>