@extends('index')
@section('content')
    <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
        <h1 class="h2">Produtos</h1>
    </div>
    <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-2 pb-2 mb-3">
        <form action="{{ route('produto.index') }}" class="form-control-lg d-flex justify-content-between w-100" method="GET">
            <div class="d-flex align-items-center">
                <input type="text" name="pesquisar" id="pesquisar" placeholder="Digite o nome">
                <button class="btn btn-info mx-3">Pesquisar</button>
            </div>
            <div>
                <a href="{{ route('produto.create') }}" class="btn btn-dark">Incluir Produto</a>
            </div>
        </form>
    </div>
    <h2>Lista de Produtos</h2>
      <div class="table-responsive small">
        <table class="table table-striped table-sm">
          <thead>
            <tr>
              <th>Nome</th>
              <th>Valor</th>
              <th>Ações</th>              
            </tr>
          </thead>
          <tbody>
            @foreach ($produtos as $p)
            <tr>
                <td>{{ $p->nome }}</td>
                <td>{{ 'R$' .' '.number_format($p->valor, 2, ',', '.')   }}</td>
                <td class="d-flex justify-between align-items-center">
                    <a href="{{ route('produto.edit', ['produto' => $p->id]) }}" class="btn btn-info mx-3">Editar</a>                    
                    <a onclick="deleteRegistroPaginacao('{{ route('produto.delete') }}', {{ $p->id }})" class="btn btn-danger">Excluir</a>
                </td>
            </tr>
            @endforeach
          </tbody>
        </table>
      </div>
    
@endsection