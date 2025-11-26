@extends('layouts.app')

@section('content')
<div class="container">

    {{-- Mensagem de Sucesso vinda da Session --}}
    @if(session('success'))
        <div class="alert alert-success mt-3">
            {{ session('success') }}
        </div>
    @endif

    {{-- Exibir último item acessado via Cookie --}}
    @if(Cookie::get('ult_categoria'))
        <div class="alert alert-info mt-3">
            Última categoria acessada: <b>{{ Cookie::get('ult_categoria') }}</b>
        </div>
    @endif

    <h1 class="my-4">Categorias</h1>

    <a href="{{ route('categorias.create') }}" class="btn btn-primary mb-3">Nova Categoria</a>

    <table class="table table-bordered">
        <thead>
            <tr>
                <th>ID</th>
                <th>Nome</th>
                <th>Ações</th>
            </tr>
        </thead>
        <tbody>
            @foreach($categorias as $categoria)
                <tr>
                    <td>{{ $categoria->id }}</td>
                    <td>{{ $categoria->nome }}</td>
                    <td>
                        <a href="{{ route('categorias.edit', $categoria) }}" class="btn btn-warning btn-sm">Editar</a>

                        <form action="{{ route('categorias.destroy', $categoria) }}"
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
