<?php

namespace App\Http\Controllers;

use App\Models\Categoria;
use App\Models\Produto;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use PhpParser\Node\Expr\AssignOp\Concat;

class ProdutoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $produtos = Produto::all();
        return  view('produtos.index', compact('produtos'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $categorias = Categoria::all();
        return view('produtos.create', compact('categorias'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $data = $request->all();
        if ($request->file('imagem')->isValid()) {
            $nameFile = hash('sha256', time()). '.' .$request->imagem->extension();
            $image = $request->file('imagem')->storeAs('produtos', $nameFile);
            $data['imagem'] = $image;
        }
        Produto::create($data);
        return redirect()->route('produtos.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Produto  $produto
     * @return \Illuminate\Http\Response
     */
    public function show(Produto $produto)
    {
        $categorias = Categoria::all();
        return view('produtos.show', compact('produto', 'categorias'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Produto  $produto
     * @return \Illuminate\Http\Response
     */
    public function edit(Produto $produto)
    {
        $categorias = Categoria::all();
        return view('produtos.edit', compact('produto', 'categorias'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Produto  $produto
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Produto $produto)
    {
        $data = $request->all();
        if($request->hasFile('imagem')){
        if ($request->file('imagem')->isValid()) {
            if (Storage::exists($produto->imagem))
                Storage::delete($produto->imagem);
        }
            $nameFile = hash('sha256', time()). '.' .$request->imagem->extension();
            $image = $request->file('imagem')->storeAs('produtos', $nameFile);
            $data['imagem'] = $image;
        }else{
            $data['imagem'] = $produto->imagem;
        }
        $produto->update($data);
        return redirect()->route('produtos.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Produto  $produto
     * @return \Illuminate\Http\Response
     */
    public function destroy(Produto $produto)
    {
        if (Storage::exists($produto->imagem))
            Storage::delete($produto->imagem);
        $produto->delete();
        return redirect()->route('produtos.index');
    }
}
