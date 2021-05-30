@extends('layout')
@section('titulo', 'Detalhes do Produto')
@section('main')

    <h1>Editar produto</h1>
    <p>
        Voltar para pagina inicial:
        <a href="{{ route('produtos.index') }}" class="btn btn-success btn-sm">Voltar</a>
    </p>

    @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form action="/produtos/gravar/{{ $produto->id }}" method="POST">
        @csrf
        <div class="mb-3">
            <label for="exampleInputEmail1" class="form-label">Descricao</label>
            <input type="text" class="form-control" name="descricao" value="{{ $produto->descricao }}">
        </div>
        <div class="mb-3">
            <label for="exampleInputEmail1" class="form-label">Valor</label>
            <input type="text" class="form-control" name="valor" value="{{ $produto->valor }}">
        </div>
        <div class="mb-3">
            <label for="exampleInputEmail1" class="form-label">Quantidade</label>
            <input type="number" class="form-control" name="quantidade" value="{{ $produto->quantidade }}">
        </div>
        <div class="mb-3">
            <label for="exampleInputEmail1" class="form-label">Url</label>
            <input type="text" class="form-control" name="slug" value="{{ $produto->slug }}">
        </div>
        <button type="submit" class="btn btn-primary">Salvar</button>
    </form>

@endsection
