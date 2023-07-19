@extends('index')
@section('content')
<div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
  <h1 class="h2">Nova Secretaria</h1>
</div>
<form class="row g-3" action="{{ route('secretaria.store') }}" method="POST">    
  @csrf
  @method('POST')
    <div class="col-12">
      <label for="nome" class="form-label">Nome da Secretaria</label>
      <input type="text" name="nome"  value="{{ old('nome') ?? ''}}" class="form-control @error('nome') is-invalid @enderror" id="nome" placeholder="Informe o nome da secretaria">
      @if ($errors->has('nome'))
        <span class="text-danger p-3">{{ $errors->first('nome') }}</span>
      @endif
    </div>
    <div class="col-12">
      <label for="sigla" class="form-label">Sigla da Secretaria</label>
      <input type="text" name="sigla" value="{{ old('sigla') ?? '' }}" class="form-control @error('sigla') is-invalid @enderror" id="sigla" placeholder="Informe a sigla da secretaria">
      @if ($errors->has('sigla'))
        <span class="text-danger p-3">{{ $errors->first('sigla') }}</span>
      @endif
    </div>    
    <div class="col-12">
      <button type="submit" class="btn btn-primary">Adicionar</button>
    </div>
  </form> 
    
@endsection