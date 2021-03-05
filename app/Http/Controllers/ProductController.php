<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ProductController extends Controller
{
    public function index()
    {
        return response()->json([
            ['id' => 1, 'nome' => 'mouse'],
            ['id' => 2, 'nome' => 'impressora'],
            ['id' => 3, 'nome' => 'teclado'],
            ['id' => 4, 'nome' => 'monitor'],
        ]);
    }
}
