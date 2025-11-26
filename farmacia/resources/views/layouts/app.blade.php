<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <title>@yield('title')</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
</head>

<body class="bg-light">

<nav class="navbar navbar-expand-lg navbar-dark bg-dark mb-4">
    <div class="container">
        <a class="navbar-brand" href="/">Farmácia</a>

        <div>
            <a href="/categorias" class="btn btn-outline-light me-2">Categorias</a>
            <a href="/produtos" class="btn btn-outline-light">Produtos</a>
        </div>
    </div>
</nav>

<div class="container">
    @yield('content')
</div>

</body>
</html>
