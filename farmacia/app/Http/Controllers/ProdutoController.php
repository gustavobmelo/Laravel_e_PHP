<?php

namespace App\Http\Controllers;

use App\Models\Produto;
use App\Models\Categoria;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class ProdutoController extends Controller
{
    // Lista produtos — envia produtos e categorias (para filtros / selects)
    public function index()
    {
        $produtos = Produto::with('categoria')->get();
        $categorias = Categoria::all();
        return view('produtos.index', compact('produtos', 'categorias'));
    }

    // Mostrar formulário de criação
    public function create()
    {
        $categorias = Categoria::all();
        return view('produtos.create', compact('categorias'));
    }

    // Armazenar novo produto (web: redireciona para a lista)
    public function store(Request $request)
    {
        $request->validate([
            'nome' => 'required|string|unique:produtos,nome',
            'preco' => 'required|numeric',
            'categoria_id' => 'required|exists:categorias,id',
            'imagem' => 'nullable|image|mimes:jpg,jpeg,png|max:2048'
        ]);

        $path = null;
        if ($request->hasFile('imagem')) {
            $path = $request->file('imagem')->store('produtos', 'public');
        }

        Produto::create([
            'nome' => $request->nome,
            'preco' => $request->preco,
            'categoria_id' => $request->categoria_id,
            'imagem' => $path
        ]);

        return redirect()->route('produtos.index')->with('success', 'Produto criado com sucesso!');
    }

    // Editar — mostra formulário com dados e lista de categorias
    public function edit($id)
    {
        $produto = Produto::findOrFail($id);
        $categorias = Categoria::all();
        return view('produtos.edit', compact('produto', 'categorias'));
    }

    // Atualizar produto (web)
    public function update(Request $request, $id)
    {
        $produto = Produto::findOrFail($id);

        $request->validate([
            'nome' => 'required|string|unique:produtos,nome,' . $id,
            'preco' => 'required|numeric',
            'categoria_id' => 'required|exists:categorias,id',
            'imagem' => 'nullable|image|mimes:jpg,jpeg,png|max:2048'
        ]);

        $data = $request->only(['nome', 'preco', 'categoria_id']);

        if ($request->hasFile('imagem')) {
            if ($produto->imagem) {
                Storage::disk('public')->delete($produto->imagem);
            }
            $data['imagem'] = $request->file('imagem')->store('produtos', 'public');
        }

        $produto->update($data);

        return redirect()->route('produtos.index')->with('success', 'Produto atualizado com sucesso!');
    }

    // Deletar produto (web)
    public function destroy($id)
    {
        $produto = Produto::findOrFail($id);

        if ($produto->imagem) {
            Storage::disk('public')->delete($produto->imagem);
        }

        $produto->delete();

        return redirect()->route('produtos.index')->with('success', 'Produto removido com sucesso!');
    }
}
