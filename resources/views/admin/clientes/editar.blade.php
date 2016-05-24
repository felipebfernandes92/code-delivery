@extends('app')

@section('content')

    <div class="container">
        <h3>Editar cliente {{ $client->user->name }}</h3>

        @include('errors._check')

        {!! Form::model($client, ['route' => ['admin.clientes.update', $client->id]]) !!}

        <div class="form-group">
            {!! Form::label('Name', 'Nome:') !!}
            {!! Form::text('user[name]', $client->user->name, ['class'=>'form-control']) !!}
        </div>

        <div class="form-group">
            {!! Form::label('Email', 'Email:') !!}
            {!! Form::text('user[email]', $client->user->email, ['class'=>'form-control']) !!}
        </div>

        <div class="form-group">
            {!! Form::label('phone', 'Telefone:') !!}
            {!! Form::text('phone', $client->phone, ['class'=>'form-control']) !!}
        </div>

        <div class="form-group">
            {!! Form::label('address', 'Endereço:') !!}
            {!! Form::text('address', $client->address, ['class'=>'form-control']) !!}
        </div>

        <div class="form-group">
            {!! Form::label('city', 'Cidade:') !!}
            {!! Form::text('city', $client->city, ['class'=>'form-control']) !!}
        </div>

        <div class="form-group">
            {!! Form::label('state', 'Estado:') !!}
            {!! Form::text('state', $client->state, ['class'=>'form-control']) !!}
        </div>

        <div class="form-group">
            {!! Form::label('zipcode', 'CEP:') !!}
            {!! Form::text('zipcode', $client->zipcode, ['class'=>'form-control']) !!}
        </div>

        <div class="form-group">
            {!! Form::submit('Adicionar', ['class'=>'btn btn-primary']) !!}
        </div>

        {!! Form::close() !!}

    </div>

@endsection