<?php

namespace App\Http\Controllers\Test;

class Foo
{
    public static function bar()
    {
        echo "Ini Adalah Foo";
    }

    function tambah($a, $b): string
    {
        return $a + $b;
    }
}
