@extends('layouts.app')

@section('title', 'Editar Categoria')

@section('content')
<h2>Editar Categoria</h2>

<form action="/categorias/{{ $categoria->id }}" method="POST" class="mt-4">
    @csrf
    @method('PUT')

    <div class="mb-3">
        <label class="form-label">Nome</label>
        <input type="text" name="nome" value="{{ $categoria->nome }}" class="form-control" required>
    </div>

    <button class="btn btn-primary">Atualizar</button>
</form>
@endsection
