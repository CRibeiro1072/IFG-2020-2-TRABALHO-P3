@extends('main')
@section('content')
    <form action="{{route('categorias.update', $categoria->id)}}" method="post">
        <h2>Edicao de Categoria</h2>
        @csrf
        @method('PUT')
        <div class="row">
            <div class="col-12">
                <label for="descricao">Descricao:</label>
                <input type="text" name="descricao" id="" class="form-control" value="{{$categoria->descricao }}">
            </div>
        </div>
           <div class="row" style="margin-top: 10px">
            <div class="col-12">
                <button type="submit" class="btn btn-primary">Salvar</button>
                <a href="{{route('categorias.index')}}" class="btn btn-danger">Cancelar</a>
            </div>
        </div>
    </form>
@endsection
