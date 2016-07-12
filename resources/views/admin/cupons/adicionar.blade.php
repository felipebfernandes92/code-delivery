@extends('app')

@section('content')

    <div class="container">
        <h3>Nova cupom</h3>

        @include('errors._check')

        {!! Form::open(['route' => 'admin.cupons.salvar']) !!}

        <div class="form-group">
            {!! Form::label('Código', 'Código:') !!}
            {!! Form::text('code', null, ['class'=>'form-control']) !!}
        </div>

        <div class="form-group">
            {!! Form::label('Valor', 'Valor:') !!}
            {!! Form::text('value', null, ['class'=>'form-control']) !!}
        </div>

        <div class="form-group">
            {!! Form::submit('Adicionar', ['class'=>'btn btn-primary']) !!}
        </div>

        {!! Form::close() !!}

    </div>

@endsection