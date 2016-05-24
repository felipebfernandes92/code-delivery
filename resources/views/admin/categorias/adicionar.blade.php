@extends('app')

@section('content')

    <div class="container">
        <h3>Nova categoria</h3>

        @include('errors._check')

        {!! Form::open(['route' => 'admin.categorias.salvar']) !!}

        <div class="form-group">
            {!! Form::label('Name', 'Nome:') !!}
            {!! Form::text('name', null, ['class'=>'form-control']) !!}
        </div>

        <div class="form-group">
            {!! Form::submit('Adicionar', ['class'=>'btn btn-primary']) !!}
        </div>

        {!! Form::close() !!}

    </div>

@endsection