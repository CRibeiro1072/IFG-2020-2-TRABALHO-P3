@extends('main')
@section('content')
    <form>
        <h2>Visualização de Categoria</h2>
         <div class="row">
            <div class="col-12">
                <label for="descricao">Descricao:</label>
                <input type="text" name="descricao" id="" class="form-control" value="{{$categoria->descricao }}" disabled>
            </div>
        </div>
           <div class="row" style="margin-top: 10px">
            <div class="col-12">
                <a href="{{route('categorias.index')}}" class="btn btn-primary">Sair</a>
            </div>
        </div>
    </form>
@endsection
