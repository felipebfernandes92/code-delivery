@extends('app')

@section('breadcrumb')
    <h5 class="breadcrumbs-title">Clientes</h5>
    <ol class="breadcrumb">
        <li><a href="index.html">Início</a></li>
        <li class="active">Clientes</li>
    </ol>
@endsection

@section('content')

    <div id="row-grouping" class="section">
        <div class="row">
            <div class="col s12 m12 19">
                <table id="data-table-simple" class="display" cellspacing="0" width="100%">
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
                                <a href="{{ route('admin.clientes.editar', ['id'=>$client->id]) }}"
                                   class="btn-floating waves-effect waves-light blue-grey btn-table"><i
                                            class="mdi-editor-mode-edit"></i></a>
                                <a href="{{ route('admin.clientes.deletar', ['id'=>$client->id]) }}"
                                   class="btn-floating waves-effect waves-light red btn-table"><i
                                            class="mdi-content-clear"></i></a>
                            </td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>

    <div class="row">
        <a href="{{ route('admin.clientes.adicionar') }}"
           class="btn-floating right btn-large waves-effect waves-light cyan darken-2 btn-add">
            <i class="mdi-content-add"></i>
        </a>
    </div>

@endsection