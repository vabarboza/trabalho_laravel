@extends('layout')
@section('titulo', 'Detalhes do Produto')
@section('main')

    <h1>Detalhes do produto</h1>
    <p>
        Voltar para pagina inicial:
        <a href="{{ route('produtos.index') }}" class="btn btn-success btn-sm">Voltar</a>
    </p>

    <ul class="list-unstyled">
        <li><strong>Produto:</strong>
            <ul>
                <li><strong>ID:</strong> {{ $produto->id }}</li>
                <li><strong>Descricao:</strong> {{ $produto->descricao }}</li>
                <li><strong>Valor:</strong> {{ $produto->valor }}</li>
                <li><strong>Quantidade:</strong> {{ $produto->quantidade }}</li>
                <li><strong>URL:</strong> {{ $produto->slug }}</li>
            </ul>
        </li>
    </ul>

@endsection
