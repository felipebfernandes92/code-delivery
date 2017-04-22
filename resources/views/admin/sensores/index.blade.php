@extends('app')

@section('breadcrumb')
    <h5 class="breadcrumbs-title">Sensores</h5>
    <ol class="breadcrumb">
        <li><a href="index.html">Início</a></li>
        <li class="active">Sensores</li>
    </ol>
@endsection

@section('content')
    <div id="row-grouping" class="section">
        <div class="row">
            <div class="col s12 m12 19">
                <table id="data-table-simple" class="display" cellspacing="0" width="100%">
                    <thead>
                    <tr>
                        <th>Código</th>
                        <th>Nome</th>
                        <th>Status</th>
                        <th>Cliente</th>
                        <th>Ações</th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach($sensors as $sensor)
                        <tr>
                            <td>{{$sensor->id}}</td>
                            <td>{{$sensor->name}}</td>
                            <td>{{$status[$sensor->status]}}</td>
                            <td>{{$sensor->client->user->name}}</td>
                            <td>
                                <a href="{{ route('admin.sensores.editar', ['id'=>$sensor->id]) }}"
                                   class="btn-floating waves-effect waves-light blue-grey btn-table"><i
                                            class="mdi-editor-mode-edit"></i></a>
                                <a href="{{ route('admin.sensores.deletar', ['id'=>$sensor->id]) }}"
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
        <a href="{{ route('admin.sensores.adicionar') }}"
           class="btn-floating right btn-large waves-effect waves-light cyan darken-2 btn-add">
            <i class="mdi-content-add"></i>
        </a>
    </div>

@endsection