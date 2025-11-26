@extends('layouts.app')

@section('title', 'Editar Produto')

@section('content')
<h2>Editar Produto</h2>

<form action="/produtos/{{ $produto->id }}" method="POST" enctype="multipart/form-data" class="mt-4">
    @csrf
    @method('PUT')

    <div class="mb-3">
        <label class="form-label">Nome</label>
        <input type="text" name="nome" value="{{ $produto->nome }}" class="form-control" required>
    </div>

    <div class="mb-3">
        <label class="form-label">Preço</label>
        <input type="number" name="preco" step="0.01" value="{{ $produto->preco }}" class="form-control" required>
    </div>

    <div class="mb-3">
        <label class="form-label">Categoria</label>
        <select name="categoria_id" class="form-control" required>
            @foreach($categorias as $categoria)
                <option value="{{ $categoria->id }}" 
                    {{ $produto->categoria_id == $categoria->id ? 'selected' : '' }}>
                    {{ $categoria->nome }}
                </option>
            @endforeach
        </select>
    </div>

    <div class="mb-3">
        <label class="form-label">Imagem Atual</label><br>

        @if($produto->imagem)
            <img src="{{ asset('storage/' . $produto->imagem) }}" width="90">
        @else
            <p>—</p>
        @endif
    </div>

    <div class="mb-3">
        <label class="form-label">Nova Imagem (opcional)</label>
        <input type="file" name="imagem" class="form-control">
    </div>

    <button class="btn btn-primary">Salvar Alterações</button>
</form>
@endsection
