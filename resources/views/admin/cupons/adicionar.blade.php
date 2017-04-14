@extends('app')

@section('breadcrumb')
    <h5 class="breadcrumbs-title">Produtos</h5>
    <ol class="breadcrumb">
        <li><a href="index.html">Início</a></li>
        <li>Produtos</li>
        <li class="active">Adicionar</li>
    </ol>
@endsection

@section('content')

    @include('errors._check')
    <div class="row">
        <div class="col s12 m12 l8">
            <h4 class="header">Adicionar Cupom</h4>
            <div class="card-panel">
                <div class="row">
                    {!! Form::open(['route' => 'admin.cupons.salvar', 'class' => 'col s12']) !!}
                    <div class="row">
                        <div class="input-field col s12">
                            {!! Form::label('Código', 'Código:') !!}
                            {!! Form::text('codigo', null) !!}
                        </div>
                        <div class="input-field col s12">
                            {!! Form::label('Valor', 'Valor:') !!}
                            {!! Form::text('value', null) !!}
                        </div>
                    </div>

                    <div class="row">
                        <div class="input-field col s12">
                            <button class="btn cyan waves-effect waves-light right" type="submit" name="action">
                                Adicionar
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