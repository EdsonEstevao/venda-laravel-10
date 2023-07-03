<?php

namespace App\Http\Controllers;

use App\Models\Produto;
use Illuminate\Http\Request;

class ProdutosController extends Controller
{
    protected $produto;
    public function __construct(Produto $produto)
    {
        $this->produto = $produto;
    }
    public function index(Request $request) {

        $data = [];
        $pesquisa = $request->pesquisar;
        
        if($pesquisa == false) {
            $produtos = Produto::all();
            
        }else {
            
            $produtos = $this->produto->getProdutosPesquisarIndex(search: $pesquisa ?? '');
        }
        
        // dd($produtos);
        // exit;
        $data = [
            'produtos' => $produtos,
        ];



        return view('pages.produtos.paginacao', $data);

        
    }

    public function create() {
        return view('pages.produtos.create');        
    }
    public function edit(Request $request) {

        dd($request->produto);
        exit;

    }

    public function delete(Request $request) {

        $id = $request->id;
        $produto = Produto::find($id);
        $produto->delete();
        return response()->json(['success' => true]);
    }
}
