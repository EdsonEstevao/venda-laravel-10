<?php

namespace App\Http\Controllers;

use App\Http\Requests\FormRequestProduto;
use App\Models\Componentes;
use App\Models\Produto;
use Illuminate\Http\Request;
use Brian2694\Toastr\Facades\Toastr;
// use Brian2694\Toastr\Facades;


class ProdutosController extends Controller
{
    protected $produto;
    public function __construct(Produto $produto)
    {
        $this->produto = $produto;
    }
    public function index(Request $request) {

        $data = [];
        $pesquisa = trim($request->pesquisar);
        $produtos = [];
        
        if($pesquisa == false) {
            // $produtos = Produto::all();
            $produtos = $this->produto::all();
            
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
    
    public function store(FormRequestProduto $request)
    {
     
        $componentes = new Componentes();
        $request['valor'] = $componentes->format_mascara_dinheiro_decimal($request->valor);
        
        $data = $request->all();     

        Produto::create($data);
        Toastr::success('Registro Adicionado com sucesso!');
        return redirect()->route('produto.index');
    }
    
    public function edit(Request $request) {
        
        $produto = $this->produto::find($request->produto);

        return view('pages.produtos.edit', compact('produto'));

    }

    public function update( FormRequestProduto $request)
    {
        $componentes = new Componentes();
        $request['valor'] = $componentes->format_mascara_dinheiro_decimal($request->valor);
        
        $produto = Produto::find($request->produto);
        $data = $request->all();
        
        $produto->update($data);       
        
        Toastr::success('Registro Atualizado com sucesso!');

        return redirect()->route('produto.index');

    }

    public function delete(Request $request) {

        $id = $request->id;
        $produto = Produto::find($id);
        $produto->delete();
        return response()->json(['success' => true]);
    }
}
