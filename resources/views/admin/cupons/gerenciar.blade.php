@extends('app')

@section('breadcrumb')
    <h5 class="breadcrumbs-title">Cupons</h5>
    <ol class="breadcrumb">
        <li><a href="index.html">Início</a></li>
        <li>Cupons</li>
        <li class="active">{{ !isset($cupom) ? 'Adicionar' : 'Editar' }}</li>
    </ol>
@endsection

@section('content')

    @include('errors._check')
    <div class="row">
        <div class="col s12 m12 l8">
            <h4 class="header">{{ !isset($cupom) ? 'Adicionar' : 'Editar' }} Cupom {{ isset($cupom->id) ? $cupom->id : null }}</h4>
            <div class="card-panel">
                <div class="row">
                    @if(!isset($cupom))
                        {!! Form::open(['route' => 'admin.cupons.salvar', 'class' => 'col s12']) !!}
                    @else
                        {!! Form::model($cupom, ['route'=>['admin.cupons.update', $cupom->id], 'class' => 'col s12']) !!}
                    @endif
                    <div class="row">
                        <div class="input-field col s12">
                            {!! Form::label('Código', 'Código:') !!}
                            {!! Form::text('codigo', isset($cupom->code) ? $cupom->code : null) !!}
                        </div>
                        <div class="input-field col s12">
                            {!! Form::label('Valor', 'Valor:') !!}
                            {!! Form::text('value', isset($cupom->value) ? $cupom->value : null) !!}
                        </div>
                    </div>

                    <div class="row">
                        <div class="input-field col s12">
                            <button class="btn cyan waves-effect waves-light right" type="submit" name="action">
                                {{ !isset($cupom) ? 'Adicionar' : 'Editar' }}
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