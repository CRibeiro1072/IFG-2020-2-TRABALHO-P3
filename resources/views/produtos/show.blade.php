@extends('main')

@section('content')
    <h2>Cadastro de Produto - Visualizar produto</h2>
    <form action="{{route('produtos.update', $produto)}}" method="post">
        <div class="row">
            <div class="col-12">
                <label for="descricao">Descricao:</label>
                <input type="text" name="descricao" id="" class="form-control" value="{{$produto->descricao}}" disabled>
            </div>
        </div>
        <div class="row">
            <div class="col-4">
                <label for="categoria">Categoria</label>
                <select name="categoria_id" id="categoria" class="form-control" disabled>
                    <option value="0" selected="true">Selecione...</option>
                    @foreach($categorias as $categoria)
                        @isset($produto)
                            @if($categoria->id == $produto->categoria->id)
                                <option value="{{$categoria->id}}" selected="true">{{$categoria->descricao}}</option>
                            @else
                                <option value="{{$categoria->id}}">{{$categoria->descricao}}</option>
                            @endif
                        @else
                            <option value="{{$categoria->id}}">{{$categoria->descricao}}</option>
                        @endisset
                    @endforeach
                </select>
            </div>
            <div class="col-4">
                <label for="tamanho">Tamanho</label>
                <select name="tamanho" id="tamanho" class="form-control" disabled>
                    <option value="0" selected="true">Selecione...</option>
                    @foreach(\App\Models\Produto::TAMANHO as $key => $value)
                        @isset($produto)
                            @if($produto->tamanho == $value)
                                <option value="{{$key}}" selected="true">{{$value}}</option>
                            @else
                                <option value="{{$key}}">{{$value}}</option>
                            @endif
                        @else
                            <option value="{{$key}}">{{$value}}</option>
                        @endisset
                    @endforeach
                </select>
            </div>
            <div class="col-4">
                <label for="generomasc">Genero</label>
                <select name="generomasc" id="generomasc" class="form-control" disabled>
                    @isset($produto)
                        @if($produto->genero == "0")
                            <option value="0" selected="true">Feminino</option>
                            <option value="1">Masculino</option>
                        @else
                            <option value="0" >Feminino</option>
                            <option value="1" selected="true">Masculino</option>
                        @endif
                    @else
                        <option value="0">Feminino</option>
                        <option value="1">Masculino</option>
                    @endisset
                </select>
            </div>
        </div>
        <div class="row">
            <div class="col-4">
                <label for="vlrproduto">Valor do produto:</label>
                <input type="number" step="0.01" name="vlrproduto" id="vlrproduto" class="form-control" value="{{isset($produto)?$produto->vlrproduto:old('vlrproduto', '') }}" disabled>
            </div>
            <div class="col-4">
                <label for="estoque">Estoque:</label>
                <input type="number" step="1" name="estoque" id="estoque" class="form-control" value="{{isset($produto)?$produto->estoque:old('estoque', '') }}" disabled>
            </div>
            <div class="col-4">
                <label for="imagem">Imagem:</label>
                <img src="{{ url("storage/{$produto->imagem}") }}" width="100px" height="100px" alt="">
            </div>
        </div>
        <div class="row" style="margin-top: 10px">
            <div class="col-12">
                <a href="{{route('produtos.index')}}" class="btn btn-danger">Sair</a>
            </div>
        </div>
    </form>
@endsection
