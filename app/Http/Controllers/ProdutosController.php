<?php

namespace App\Http\Controllers;

use App\Models\Produto;
use Illuminate\Http\Request;

class ProdutosController extends Controller
{
    public function index() {

        $data = [];
        $produtos = Produto::all();

        $data = [
            'produtos' => $produtos,
        ];


        return view('pages.produtos.paginacao', $data);

        
    }

    public function create() {
        return view('pages.produtos.create');        
    }
    public function edit(Produto $produto, Request $request) {

        dd($request->produto);
        exit;

    }

    public function delete(Produto $produto, Request $request) {
        dd($produto);
        exit;
    }
}
