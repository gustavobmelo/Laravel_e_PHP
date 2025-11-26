@extends('layouts.app')

@section('title', 'Novo Produto')

@section('content')
<h2>Criar Produto</h2>

<form action="/produtos" method="POST" enctype="multipart/form-data" class="mt-4">
    @csrf

    <div class="mb-3">
        <label class="form-label">Nome</label>
        <input type="text" name="nome" class="form-control" required>
    </div>

    <div class="mb-3">
        <label class="form-label">Preço</label>
        <input type="number" name="preco" step="0.01" class="form-control" required>
    </div>

    <div class="mb-3">
        <label class="form-label">Categoria</label>
        <select name="categoria_id" class="form-control" required>
            <option value="">Selecione</option>

            @foreach($categorias as $categoria)
                <option value="{{ $categoria->id }}">{{ $categoria->nome }}</option>
            @endforeach
        </select>
    </div>

    <div class="mb-3">
        <label class="form-label">Imagem</label>
        <input type="file" name="imagem" class="form-control">
    </div>

    <button class="btn btn-success">Salvar</button>
</form>
@endsection
