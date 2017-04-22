@extends('app')

@section('breadcrumb')
    <h5 class="breadcrumbs-title">Sensores</h5>
    <ol class="breadcrumb">
        <li><a href="index.html">Início</a></li>
        <li>Sensores</li>
        <li class="active">{{ !isset($sensor) ? 'Adicionar' : 'Editar' }}</li>
    </ol>
@endsection

@section('content')
    @include('errors._check')
    <div class="row">
        <div class="col s12 m12 l8">
            <h4 class="header">{{ !isset($sensor) ? 'Adicionar' : 'Editar' }} sensor {{ isset($sensor->name) ? $sensor->name : null }}</h4>
            <div class="card-panel">
                <div class="row">
                    @if(!isset($sensor))
                        {!! Form::open(['route' => 'admin.sensores.salvar', 'class' => 'col s12']) !!}
                    @else
                        {!! Form::model($sensor, ['route'=>['admin.sensores.update', $sensor->id], 'class' => 'col s12']) !!}
                    @endif
                    <div class="row">
                        <div class="input-field col s8">
                            {!! Form::label('name', 'Nome') !!}
                            {!! Form::text('name', isset($sensor->name) ? $sensor->name : null) !!}
                        </div>
                        <div class="input-field col s4">
                            {!! Form::select('status', $status, null) !!}
                            {!! Form::label('status', 'Status') !!}
                        </div>
                    </div>
                    <div class="row">
                        <div class="input-field col s12">
                            <select name="client_id">
                                @foreach($clients as $client)
                                    <option value="{{ $client->id }}" {{ (isset($sensor) && $sensor->client_id == $client->id) ? 'selected' : '' }}>{{ $client->user->name }}</option>
                                @endforeach
                            </select>
                            <label for="Client">Cliente</label>
                        </div>
                    </div>
                    <div class="row">
                        <div class="row">
                            <div class="input-field col s12">
                                <button class="btn cyan waves-effect waves-light right" type="submit" name="action">{{ !isset($sensor) ? 'Adicionar' : 'Editar' }}
                                    <i class="mdi-content-send right"></i>
                                </button>
                            </div>
                        </div>
                    </div>
                    {!! Form::close() !!}
                </div>
            </div>
        </div>
    </div>

@endsection