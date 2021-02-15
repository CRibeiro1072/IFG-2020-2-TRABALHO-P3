<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Categoria;

class CategoriaController extends Controller
{
    public function index()
    {
        $categorias = Categoria::all();
        return view('categorias.index', compact('categorias'));
    }

    public function create()
    {
        return view('categorias.create');
    }

    public function store(Request $request)
    {
        Categoria::create($request->all());
        return redirect()->route('categorias.index');
    }

    public function show(Categoria $categoria)
    {
        return view('categorias.show', [
            'categoria' => $categoria
        ]);
    }

    public function edit(Categoria $categoria)
    {
        return  view('categorias.edit', compact('categoria'));
    }

    public function update(Request $request, Categoria $categoria)
    {
        Categoria::where('id', $categoria->id)
            ->update($request->except('_token', '_method'));
        return redirect()->route('categorias.index');
    }

    public function destroy(Categoria $categoria)
    {
        $categoria->delete();
        return redirect()->route('categorias.index');
    }
}
