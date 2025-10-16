<!DOCTYPE html>
<html>
<head>
    <title>Categorias</title>
</head>
<body>
    <h1>Cadastro de Categorias</h1>

    @if (session('success'))
        <p style='color:green;'>{{ session('success') }}</p>
    @endif

    <form action='{{ route('categorias.store') }}' method='POST'>
        @csrf
        <input type='text' name='nome' placeholder='Nome da categoria' value='{{ old('nome') }}'>
        @error('nome') <p style='color:red;'>{{ $message }}</p> @enderror

        <button type='submit'>Cadastrar</button>
    </form>

    <h2>Lista de Categorias</h2>
    <ul>
        @forelse ($categorias as $categoria)
            <li>{{ $categoria->nome }}</li>
        @empty
            <li>Nenhuma categoria cadastrada.</li>
        @endforelse
    </ul>
</body>
</html>
