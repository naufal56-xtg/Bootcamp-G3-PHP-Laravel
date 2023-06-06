<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Test\Foo;
use Illuminate\Http\Request;

class PageController extends Controller
{
    public function index()
    {
        $foo = new Foo();
        $hasil = $foo->tambah('1', 5);
        // var_dump($hasil);
        echo $hasil;
    }
}
