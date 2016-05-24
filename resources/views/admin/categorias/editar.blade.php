@extends('app')

@section('content')

    <div class="container">
        <h3>Editando categoria {{$category->name}}</h3>

        @include('errors._check')

        {!! Form::model($category, ['route'=>['admin.categorias.update', $category->id]]) !!}

        <div class="form-group">
            {!! Form::label('Name', 'Nome:') !!}
            {!! Form::text('name', $category->name, ['class'=>'form-control']) !!}
        </div>

        <div class="form-group">
            {!! Form::submit('Editar', ['class'=>'btn btn-primary']) !!}
        </div>

        {!! Form::close() !!}

    </div>

@endsection