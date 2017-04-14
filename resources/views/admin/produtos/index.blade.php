@extends('app')

@section('breadcrumb')
    <h5 class="breadcrumbs-title">Produtos</h5>
    <ol class="breadcrumb">
        <li><a href="index.html">Início</a></li>
        <li class="active">Produtos</li>
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
                        <th>Descrição</th>
                        <th>Preço</th>
                        <th>Categoria</th>
                        <th>Ação</th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach($products as $product)
                        <tr>
                            <td>{{$product->id}}</td>
                            <td>{{$product->name}}</td>
                            <td>{{$product->description}}</td>
                            <td>R${{$product->price}}</td>
                            <td>{{$product->category->name}}</td>
                            <td>
                                <a href="{{ route('admin.produtos.editar', ['id'=>$product->id]) }}"
                                   class="btn-floating waves-effect waves-light blue-grey btn-table"><i
                                            class="mdi-editor-mode-edit"></i></a>
                                <a href="{{ route('admin.produtos.deletar', ['id'=>$product->id]) }}"
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
        <a href="{{ route('admin.produtos.adicionar') }}"
           class="btn-floating right btn-large waves-effect waves-light cyan darken-2 btn-add">
            <i class="mdi-content-add"></i>
        </a>
    </div>

@endsection