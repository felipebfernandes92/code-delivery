@extends('app')

@section('breadcrumb')
    <h5 class="breadcrumbs-title">Clientes</h5>
    <ol class="breadcrumb">
        <li><a href="index.html">Início</a></li>
        <li>Clientes</li>
        <li class="active">Adicionar</li>
    </ol>
@endsection

@section('content')
    @include('errors._check')
    <div class="row">
        <div class="col s12 m12 l8">
            <h4 class="header">Adicionar cliente</h4>
            <div class="card-panel">
                <div class="row">

                    {!! Form::open(['route' => 'admin.clientes.salvar']) !!}

                    <div class="input-field col s12">
                        {!! Form::label('Name', 'Nome:') !!}
                        {!! Form::text('user[name]', null) !!}
                    </div>

                    <div class="input-field col s12">
                        {!! Form::label('Email', 'Email:') !!}
                        {!! Form::text('user[email]', null) !!}
                    </div>

                    <div class="input-field col s12">
                        {!! Form::label('phone', 'Telefone:') !!}
                        {!! Form::text('phone', null) !!}
                    </div>

                    <div class="input-field col s12">
                        {!! Form::label('address', 'Endereço:') !!}
                        {!! Form::text('address', null) !!}
                    </div>

                    <div class="input-field col s6">
                        {!! Form::label('city', 'Cidade:') !!}
                        {!! Form::text('city', null) !!}
                    </div>

                    <div class="input-field col s3">
                        {!! Form::label('state', 'Estado:') !!}
                        {!! Form::text('state', null) !!}
                    </div>

                    <div class="input-field col s3">
                        {!! Form::label('zipcode', 'CEP:') !!}
                        {!! Form::text('zipcode', null) !!}
                    </div>

                    <div class="row">
                        <div class="input-field col s12">
                            <button class="btn cyan waves-effect waves-light right" type="submit" name="action">Adicionar
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