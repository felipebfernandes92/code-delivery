@extends('app')

@section('content')

    <div class="container">
        <h3>Editando produto {{$product->name}}</h3>

        @include('errors._check')

        {!! Form::model($product, ['route'=>['admin.produtos.update', $product->id]]) !!}

        <div class="form-group">
            {!! Form::label('Category', 'Categoria:') !!}
            {!! Form::select('category_id', $categories, null, ['class'=>'form-control']) !!}
        </div>

        <div class="form-group">
            {!! Form::label('Name', 'Nome:') !!}
            {!! Form::text('name', $product->name, ['class'=>'form-control']) !!}
        </div>

        <div class="form-group">
            {!! Form::label('Description', 'Descrição:') !!}
            {!! Form::textarea('description', $product->description, ['class'=>'form-control']) !!}
        </div>

        <div class="form-group">
            {!! Form::label('Price', 'Preço:') !!}
            {!! Form::text('price', $product->price, ['class'=>'form-control']) !!}
        </div>

        <div class="form-group">
            {!! Form::submit('Editar', ['class'=>'btn btn-primary']) !!}
        </div>

        {!! Form::close() !!}

    </div>

@endsection