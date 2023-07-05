<?php

namespace App\Http\Controllers;

use App\Http\Requests\FormRequestProduto;
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
        // dd($request->all());
        // exit;
        $valor = str_replace(".", ",",  $request->valor);

        $valor = floatval(str_replace(",", ".", str_replace(".", "", $valor)));
        
        $request['valor'] = $valor;


        $data = $request->all();

        dd($data == null);
        exit;

        Produto::create($data);

        return redirect()->route('produto.index');
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
