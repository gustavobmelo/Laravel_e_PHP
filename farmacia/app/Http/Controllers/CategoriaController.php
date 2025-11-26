<?php

namespace App\Http\Controllers;

use App\Models\Categoria;
use Illuminate\Http\Request;

class CategoriaController extends Controller
{
    public function index(Request $request)
{
    // Salva cookie da última categoria acessada
    cookie()->queue('ultima_pagina', 'categorias', 60); // 60 min

    $categorias = Categoria::all();
    return view('categorias.index', compact('categorias'));
}

    public function store(Request $request)
{
    $request->validate([
        'nome' => 'required|string|unique:categorias,nome',
    ]);

    Categoria::create([
        'nome' => $request->nome,
    ]);

    return redirect()
        ->route('categorias.index')
        ->with('success', 'Categoria criada com sucesso!');
}

    public function show($id)
    {
        return Categoria::findOrFail($id);
    }

    public function update(Request $request, $id)
{
    $categoria = Categoria::findOrFail($id);

    $request->validate([
        'nome' => 'required|string|unique:categorias,nome,' . $id,
    ]);

    $categoria->update([
        'nome' => $request->nome,
    ]);

    return redirect()
        ->route('categorias.index')
        ->with('success', 'Categoria atualizada com sucesso!');
}

    public function destroy($id)
{
    $categoria = Categoria::findOrFail($id);
    $categoria->delete();

    return redirect()
        ->route('categorias.index')
        ->with('success', 'Categoria removida com sucesso!');
}

    public function create()
{
    return view('categorias.create');
}

public function edit($id)
{
    $categoria = Categoria::findOrFail($id);
    return view('categorias.edit', compact('categoria'));
}
}
