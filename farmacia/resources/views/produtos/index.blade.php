@extends('layouts.app')

@section('content')
<div class="container">

    {{-- Mensagem de Sucesso --}}
    @if(session('success'))
        <div class="alert alert-success mt-3">
            {{ session('success') }}
        </div>
    @endif

    {{-- Cookie com última visita --}}
    @if(Cookie::get('ult_produto'))
        <div class="alert alert-info mt-3">
            Último produto acessado: <b>{{ Cookie::get('ult_produto') }}</b>
        </div>
    @endif

    <h1 class="my-4">Produtos</h1>

    <a href="{{ route('produtos.create') }}" class="btn btn-primary mb-3">Novo Produto</a>

    <table class="table table-bordered">
        <thead>
            <tr>
                <th>ID</th>
                <th>Nome</th>
                <th>Categoria</th>
                <th>Preço</th>
                <th>Ações</th>
            </tr>
        </thead>
        <tbody>
            @foreach($produtos as $produto)
                <tr>
                    <td>{{ $produto->id }}</td>
                    <td>{{ $produto->nome }}</td>
                    <td>{{ $produto->categoria->nome ?? 'Sem categoria' }}</td>
                    <td>R$ {{ number_format($produto->preco, 2, ',', '.') }}</td>

                    <td>
                        <a href="{{ route('produtos.edit', $produto) }}" class="btn btn-warning btn-sm">Editar</a>

                        <form action="{{ route('produtos.destroy', $produto) }}"
                              method="POST"
                              style="display:inline-block;">
                            @csrf
                            @method('DELETE')
                            <button class="btn btn-danger btn-sm" onclick="return confirm('Excluir?')">
                                Excluir
                            </button>
                        </form>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection
