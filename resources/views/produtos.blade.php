<!DOCTYPE html>
<html>
<head>
    <title>Produtos</title>
</head>
<body>
    <h1>Cadastro de Produtos</h1>

    @if (session('success'))
        <p style='color:green;'>{{ session('success') }}</p>
    @endif

    <form action='{{ route('produtos.store') }}' method='POST'>
        @csrf
        <input type='text' name='nome' placeholder='Nome do produto' value='{{ old('nome') }}'>
        @error('nome') <p style='color:red;'>{{ $message }}</p> @enderror

        <input type='number' step='0.01' name='preco' placeholder='Preço' value='{{ old('preco') }}'>
        @error('preco') <p style='color:red;'>{{ $message }}</p> @enderror

        <button type='submit'>Cadastrar</button>
    </form>

    <h2>Lista de Produtos</h2>
    <ul>
        @forelse ($produtos as $produto)
            <li>{{ $produto->nome }} — R$ {{ number_format($produto->preco, 2, ',', '.') }}</li>
        @empty
            <li>Nenhum produto cadastrado.</li>
        @endforelse
    </ul>
</body>
</html>
