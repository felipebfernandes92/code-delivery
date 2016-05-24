@extends('app')

@section('content')

    <div class="container">
        <h3>Produtos</h3>
        <a href="{{ route('admin.produtos.adicionar') }}" class="btn btn-default">Novo produto</a>
        <br/><br/>

        <table class="table table-bordered">
            <thead>
            <tr>
                <th>ID</th>
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
                    <td>{{$product->price}}</td>
                    <td>{{$product->category->name}}</td>
                    <td>
                        <a href="{{ route('admin.produtos.editar', ['id'=>$product->id]) }}" class="btn btn-default btn-sm"> Editar</a>
                        <a href="{{ route('admin.produtos.deletar', ['id'=>$product->id]) }}" class="btn btn-default btn-sm"> Remover</a>
                    </td>
                </tr>
            @endforeach
            </tbody>
        </table>

        {!! $products->render()  !!}
    </div>

@endsection