@extends('layouts.app')

@section('title', 'Nova Categoria')

@section('content')
<h2>Criar Categoria</h2>

<form action="/categorias" method="POST" class="mt-4">
    @csrf

    <div class="mb-3">
        <label class="form-label">Nome da Categoria</label>
        <input type="text" name="nome" class="form-control" required>
    </div>

    <button class="btn btn-success">Salvar</button>
</form>
@endsection
