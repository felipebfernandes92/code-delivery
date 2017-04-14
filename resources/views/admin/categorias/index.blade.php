@extends('app')

@section('breadcrumb')
    <h5 class="breadcrumbs-title">Categorias</h5>
    <ol class="breadcrumb">
        <li><a href="index.html">Início</a></li>
        <li class="active">Categorias</li>
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
                        <th>Ação</th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach($categories as $category)
                        <tr>
                            <td>{{$category->id}}</td>
                            <td>{{$category->name}}</td>
                            <td>
                                <a href="{{ route('admin.categorias.editar', ['id'=>$category->id]) }}"
                                   class="btn-floating waves-effect waves-light blue-grey btn-table"><i class="mdi-editor-mode-edit"></i></a>
                            </td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>

    <div class="row">
        <a href="{{ route('admin.categorias.adicionar') }}"
           class="btn-floating right btn-large waves-effect waves-light cyan darken-2 btn-add">
            <i class="mdi-content-add"></i>
        </a>
    </div>

@endsection