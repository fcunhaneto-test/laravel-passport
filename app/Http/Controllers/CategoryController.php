<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Gate;

class CategoryController extends Controller
{
    public function index()
    {
        if(Gate::allows('isAdmin')) {
            return response()->json([
                ['id' => 1, 'informatica'],
                ['id' => 2, 'eletrônicos'],
                ['id' => 3, 'ferramentas'],
                ['id' => 4, 'papelaria'],
            ]);
        }
        return response()->json(['resp' => 'Não habilitado', 403]);
    }
}
