@extends('index')
@section('content')
    <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
        <h1 class="h2">Secretarias</h1>
    </div>
    <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-2 pb-2 mb-3">
        <form action="{{ route('secretaria.index') }}" class="form-control-lg d-flex justify-content-between w-100" method="GET">
            <div class="d-flex align-items-center">
                <input type="text" name="pesquisar" id="pesquisar" placeholder="Digite o nome">
                <button class="btn btn-info mx-3">Pesquisar</button>
            </div>
            <div>
                <a href="{{ route('secretaria.create') }}" class="btn btn-dark">Adicionar Secretaria</a>
            </div>
        </form>
    </div>
    <h2>Lista de Secretarias</h2>
      <div class="table-responsive small">
        <table class="table table-striped table-sm">
          <thead>
            <tr>
              <th>Nome</th>
              <th>Sigla</th>
              <th>Ações</th>              
            </tr>
          </thead>
          <tbody>
            @if (!empty($secretarias))
              @foreach ($secretarias as $s)
              <tr style="vertical-align: middle;">
                  <td>{{ $s->nome ?? '' }}</td>                 
                  <td>{{ $s->sigla ?? '' }}</td>
                  <td class="d-flex justify-between align-items-center no-wrap">
                  {{-- <td> --}}
                      <a href="{{ route('secretaria.edit', ['secretaria' => $s->id]) }}" class="btn btn-info me-3">Editar</a>                    
                      <a onclick="deleteRegistroPaginacao('{{ route('secretaria.delete') }}', {{ $s->id }})" class="btn btn-danger">Excluir</a>
                  </td>
              </tr>
              @endforeach                
            @else

              <tr>
                <td colspan="3">Não há Dados<td>
              </tr>

            @endif
          </tbody>
        </table>
      </div>
    
@endsection