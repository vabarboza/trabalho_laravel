@extends('layout')
@section('titulo', 'Listar Produtos')
@section('main')

    <h1>Lista de produtos</h1>
    <p>
        Cadastrar novo produto:
        <a href="{{ route('produtos.create') }}" class="btn btn-success btn-sm">Cadastrar</a>
    </p>

    @if (session('status'))
        <div class="alert alert-success">
            {{ session('status') }}
        </div>
    @endif

    <table class="table caption-top">
        <caption>Lista de Produtos</caption>
        <thead>
            <tr>
                <th scope="col">Descricão</th>
                <th scope="col">Valor</th>
                <th scope="col">Quantidade</th>
                <th scope="col">Url</th>
                <th scope="col">Ações</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($produtos as $produtos)
                <tr>
                    <td>{{ $produtos->descricao }}</td>
                    <td>{{ $produtos->valor }}</td>
                    <td>{{ $produtos->quantidade }}</td>
                    <td>{{ $produtos->slug }}</td>
                    <td>
                        <a href="/produtos/{{ $produtos->slug }}" class="badge bg-secondary">Exibir</a>
                        <a href="/produtos/editar/{{ $produtos->id }}" class="badge bg-primary">Editar</a>
                        <a href="/produtos/apagar/{{ $produtos->id }}" class="badge bg-danger">Excluir</a>
                    </td>
                </tr>
            @endforeach

        </tbody>
    </table>

@endsection
