@extends('main')
@section('content')
    <h2>Cadastro de Categoria</h2>
    <form action="{{route('categorias.store')}}" method="post">
        @csrf
        <div class="row">
            <div class="col-12">
            <label for="descricao">Descricao:</label>
            <input type="text" name="descricao" id="" class="form-control">
        </div>
        <div class="row" style="margin-top: 10px">
            <div class="col-12">
                <button type="submit" class="btn btn-primary">Salvar</button>
                <a href="{{route('categorias.index')}}" class="btn btn-danger">Cancelar</a>
            </div>
        </div>
    </form>
@endsection
