@extends('app')

@section('content')

    <div class="container">
        <h3>Novo cliente</h3>

        @include('errors._check')

        {!! Form::open(['route' => 'admin.clientes.salvar']) !!}

        <div class="form-group">
            {!! Form::label('Name', 'Nome:') !!}
            {!! Form::text('user[name]', null, ['class'=>'form-control']) !!}
        </div>

        <div class="form-group">
            {!! Form::label('Email', 'Email:') !!}
            {!! Form::text('user[email]', null, ['class'=>'form-control']) !!}
        </div>

        <div class="form-group">
            {!! Form::label('phone', 'Telefone:') !!}
            {!! Form::text('phone', null, ['class'=>'form-control']) !!}
        </div>

        <div class="form-group">
            {!! Form::label('address', 'Endereço:') !!}
            {!! Form::text('address', null, ['class'=>'form-control']) !!}
        </div>

        <div class="form-group">
            {!! Form::label('city', 'Cidade:') !!}
            {!! Form::text('city', null, ['class'=>'form-control']) !!}
        </div>

        <div class="form-group">
            {!! Form::label('state', 'Estado:') !!}
            {!! Form::text('state', null, ['class'=>'form-control']) !!}
        </div>

        <div class="form-group">
            {!! Form::label('zipcode', 'CEP:') !!}
            {!! Form::text('zipcode', null, ['class'=>'form-control']) !!}
        </div>

        <div class="form-group">
            {!! Form::submit('Adicionar', ['class'=>'btn btn-primary']) !!}
        </div>

        {!! Form::close() !!}

    </div>

@endsection