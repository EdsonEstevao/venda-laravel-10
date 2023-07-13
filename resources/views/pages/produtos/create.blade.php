@extends('index')
@section('content')
<div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
  <h1 class="h2">Adicionar Produto</h1>
</div>
<form class="row g-3" action="{{ route('produto.store') }}" method="POST">    
  @csrf
  @method('POST')
    <div class="col-12">
      <label for="nome" class="form-label">Nome do Produto</label>
      <input type="text" name="nome"  value="{{ old('nome') ?? ''}}" class="form-control @error('nome') is-invalid @enderror" id="nome" placeholder="Informe o nome do produto">
      @if ($errors->has('nome'))
        <span class="text-danger p-3">{{ $errors->first('nome') }}</span>
      @endif
    </div>
    <div class="col-12">
      <label for="valor" class="form-label">Valor</label>
      <input type="text" name="valor" value="{{ old('valor') ?? '' }}" class="form-control @error('valor') is-invalid @enderror" id="valor" placeholder="Informe o valor do produto">
      @if ($errors->has('valor'))
        <span class="text-danger p-3">{{ $errors->first('valor') }}</span>
      @endif
    </div>    
    <div class="col-12">
      <button type="submit" class="btn btn-primary">Adicionar</button>
    </div>
  </form> 
    
@endsection