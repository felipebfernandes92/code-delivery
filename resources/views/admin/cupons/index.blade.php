@extends('app')

@section('breadcrumb')
    <h5 class="breadcrumbs-title">Cupons</h5>
    <ol class="breadcrumb">
        <li><a href="index.html">Início</a></li>
        <li class="active">Cupons</li>
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
                <th>Código</th>
                <th>Valor</th>
                <th>Ação</th>
            </tr>
            </thead>
            <tbody>
            @foreach($cupoms as $cupom)
                <tr>
                    <td>{{$cupom->id}}</td>
                    <td>{{$cupom->code}}</td>
                    <td>{{$cupom->value}}</td>
                    <td>
                        <a href="{{ route('admin.cupons.editar', ['id'=>$cupom->id]) }}"
                           class="btn-floating waves-effect waves-light blue-grey btn-table"><i
                                    class="mdi-editor-mode-edit"></i></a>
                    </td>
                </tr>
            @endforeach
            </tbody>
                </table>
            </div>
        </div>
    </div>

    <div class="row">
        <a href="{{ route('admin.cupons.adicionar') }}"
           class="btn-floating right btn-large waves-effect waves-light cyan darken-2 btn-add">
            <i class="mdi-content-add"></i>
        </a>
    </div>

@endsection