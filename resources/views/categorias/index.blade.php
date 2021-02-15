@extends('main')

@section('content')
    <p><a href="{{route('categorias.create')}}" class="btn btn-success">Nova Categoria</a></p>
       <table class="table table-hover">
        <thead>
        <tr>
            <th>Descricao</th>
            <th>Acao</th>
        </tr>
        </thead>
           <tbody>
           @foreach($categorias as $categoria)
           <tr>
               <td>{{$categoria->descricao}}</td>
               <td>
                   <form action="{{ route('categorias.destroy', ['categoria' => $categoria->id]) }}"method="post">
                       @csrf
                       @method('DELETE')
                       <button class="btn btn-danger" alt="Excluir">Excluir</button>
                       <a href="{{ route('categorias.edit', ['categoria' => $categoria->id]) }}" class="btn btn-success">Editar</a>
                       <a href="{{ route('categorias.show', ['categoria' => $categoria->id]) }}" class="btn btn-primary">Ver</a>
                   </form>
               </td>
           </tr>
           @endforeach
           </tbody>
    </table>
@endsection
