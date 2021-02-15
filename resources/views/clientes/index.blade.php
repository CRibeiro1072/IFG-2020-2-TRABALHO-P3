@extends('main')

@section('content')
    <p><a href="{{route('clientes.create')}}" class="btn btn-success">Novo Cliente</a></p>
       <table class="table table-hover">
        <thead>
        <tr>
            <th>Nome</th>
            <th>Email</th>
            <th>Telefone</th>
            <th>Acoes</th>
        </tr>
        </thead>
           <tbody>
           @foreach($clientes as $cliente)
           <tr>
               <td>{{$cliente->nome}}</td>
               <td>{{$cliente->email}}</td>
               <td>{{$cliente->telefone}}</td>
               <td>
                   <form action="{{ route('clientes.destroy', ['cliente' => $cliente->id]) }}"method="post">
                       @csrf
                       @method('DELETE')
                       <button class="btn btn-danger" alt="Excluir">Excluir</button>
                       <a href="{{ route('clientes.edit', ['cliente' => $cliente->id]) }}" class="btn btn-success">Editar</a>
                       <a href="{{ route('clientes.show', ['cliente' => $cliente->id]) }}" class="btn btn-primary">Ver</a>
                   </form>
               </td>
           </tr>
           @endforeach
           </tbody>
    </table>
@endsection
