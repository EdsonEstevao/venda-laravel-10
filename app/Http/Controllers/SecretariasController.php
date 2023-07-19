<?php

namespace App\Http\Controllers;

use App\Http\Requests\FormRequestSecretaria;
use App\Models\Secretaria;
use Brian2694\Toastr\Facades\Toastr;
use Illuminate\Http\Request;

class SecretariasController extends Controller
{
    
    public function index(Request $request)
    {

        $data = [];
        $pesquisa = trim($request->pesquisar);
        $secretarias = [];
        $secretarias = new Secretaria;
        if($pesquisa == false) {
            // $secretaria = Produto::all();
            $secretarias = Secretaria::orderby('nome', 'asc')->get();
            
        }else {
            
            $secretarias = $secretarias->getPesquisarIndex(search: $pesquisa ?? '');
        }
        
        // dd($secretarias);
        // exit;
        $data = [
            'secretarias' => $secretarias,
        ];

        // $secretarias = Secretaria::orderby('nome', 'asc')->get();

        return view('pages.secretarias.index',$data);
        
    } 

    public function create()
    {
        // 
        return view('pages.secretarias.create');        
    }
    public function store(FormRequestSecretaria $request)
    {
        $encoding = mb_internal_encoding(); // ou UTF-8, ISO-8859-1...             
        $sigla = trim(mb_strtoupper($request->sigla, $encoding));
        $nome = trim(mb_strtoupper($request->nome, $encoding));
        $request['sigla'] = $sigla;
        $request['nome'] = $nome;
        $data = $request->all();

        Secretaria::create($data);
        
        Toastr::success('Registro Adicionado com sucesso!');
        return redirect()->route('secretaria.index');
    }

    public function edit(Request $request)
    {
        $secretaria = Secretaria::find($request->secretaria);        
        
        return view('pages.secretarias.edit', compact('secretaria'));
    }

    public function update(Request $request)
    {        
        
        $encoding = mb_internal_encoding(); // ou UTF-8, ISO-8859-1...     
        $secretaria = Secretaria::find($request->secretaria);        
        $sigla = trim(mb_strtoupper($request->sigla, $encoding));
        $nome = trim(mb_strtoupper($request->nome, $encoding));
        $request['sigla'] = $sigla;
        $request['nome'] = $nome;
        
        $data = $request->all();

        $secretaria->update($data);

        Toastr::success('Registro Atualizado com sucesso!');
        return redirect()->route('secretaria.index');
        
    }

}
