@extends('app')

@section('breadcrumb')
    <h5 class="breadcrumbs-title">Clientes</h5>
    <ol class="breadcrumb">
        <li><a href="index.html">Início</a></li>
        <li>Clientes</li>
        <li class="active">{{ !isset($client) ? 'Adicionar' : 'Editar' }}</li>
    </ol>
@endsection

@section('content')
    @include('errors._check')
    <div class="row">
        <div class="col s12 m12 l8">
            <h4 class="header">{{ !isset($client) ? 'Adicionar' : 'Editar' }} cliente {{ isset($client->user->name) ? $client->user->name : null }}</h4>
            <div class="card-panel">
                <div class="row">

                    @if(!isset($client))
                        {!! Form::open(['route' => 'admin.clientes.salvar', 'class' => 'col s12']) !!}
                    @else
                        {!! Form::model($client, ['route'=>['admin.clientes.update', $client->id], 'class' => 'col s12']) !!}
                    @endif

                    <div class="input-field col s12">
                        {!! Form::label('Name', 'Nome:') !!}
                        {!! Form::text('user[name]', isset($client->user->name) ? $client->user->name : null) !!}
                    </div>

                    <div class="input-field col s12">
                        {!! Form::label('Email', 'Email:') !!}
                        {!! Form::text('user[email]', isset($client->user->email) ? $client->user->email : null) !!}
                    </div>

                    <div class="input-field col s12">
                        {!! Form::label('phone', 'Telefone:') !!}
                        {!! Form::text('phone', isset($client->user->phone) ? $client->user->phone : null) !!}
                    </div>

                    <div class="input-field col s12">
                        {!! Form::label('address', 'Endereço:') !!}
                        {!! Form::text('address', isset($client->user->address) ? $client->user->address : null) !!}
                    </div>

                    <div class="input-field col s6">
                        {!! Form::label('city', 'Cidade:') !!}
                        {!! Form::text('city', isset($client->user->city) ? $client->user->city : null) !!}
                    </div>

                    <div class="input-field col s3">
                        {!! Form::label('state', 'Estado:') !!}
                        {!! Form::text('state', isset($client->user->state) ? $client->user->state : null) !!}
                    </div>

                    <div class="input-field col s3">
                        {!! Form::label('zipcode', 'CEP:') !!}
                        {!! Form::text('zipcode', isset($client->user->zipcode) ? $client->user->zipcode : null) !!}
                    </div>

                    <div class="row">
                        <div class="input-field col s12">
                            <button class="btn cyan waves-effect waves-light right" type="submit" name="action">{{ !isset($client) ? 'Adicionar' : 'Editar' }}
                                <i class="mdi-content-send right"></i>
                            </button>
                        </div>
                    </div>
                    {!! Form::close() !!}
                </div>
            </div>
        </div>
    </div>
@endsection