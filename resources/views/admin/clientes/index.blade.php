@extends('app')

@section('content')

    <div class="container">
        <h3>Clientes</h3>
        <a href="{{ route('admin.clientes.adicionar') }}" class="btn btn-default">Novo cliente</a>
        <br/><br/>

        <table class="table table-bordered">
            <thead>
            <tr>
                <th>ID</th>
                <th>Nome</th>
                <th>Telefone</th>
                <th>Endereço</th>
                <th>Cidade</th>
                <th>Estado</th>
                <th>CEP</th>
                <th>Email</th>
                <th>Ação</th>
            </tr>
            </thead>
            <tbody>
            @foreach($clients as $client)
                <tr>
                    <td>{{$client->id}}</td>
                    <td>{{$client->user->name}}</td>
                    <td>{{$client->phone}}</td>
                    <td>{{$client->address}}</td>
                    <td>{{$client->city}}</td>
                    <td>{{$client->state}}</td>
                    <td>{{$client->zipcode}}</td>
                    <td>{{$client->user->email}}</td>
                    <td>
                        <a href="{{ route('admin.clientes.editar', ['id'=>$client->id]) }}" class="btn btn-default btn-sm"> Editar</a>
                        <a href="{{ route('admin.clientes.deletar', ['id'=>$client->id]) }}" class="btn btn-default btn-sm"> Remover</a>
                    </td>
                </tr>
            @endforeach
            </tbody>
        </table>

        {!! $clients->render()  !!}
    </div>

@endsection