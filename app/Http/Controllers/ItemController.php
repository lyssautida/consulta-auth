<?php

namespace App\Http\Controllers;

use App\Models\Produto;
use Illuminate\Http\Request;

class ItemController extends Controller
{
    public function index()
    {
        $itens = Produto::all();
        return view('produtos.index', ['itens' => $itens]);
    }

    public function create()
    {
        return view('produtos.create');
    }
}
