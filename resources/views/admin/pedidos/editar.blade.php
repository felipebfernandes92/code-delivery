@extends('app')

@section('breadcrumb')
    <h5 class="breadcrumbs-title">Pedidos</h5>
    <ol class="breadcrumb">
        <li><a href="index.html">Início</a></li>
        <li>Pedidos</li>
        <li class="active">Editar</li>
    </ol>
@endsection

@section('content')

    <div class="row">
        <div class="col s12 m12 l8">
            <h4 class="header">Editando pedido #{{ $order->id }}</h4>
            <div class="card-panel">
                <div class="row">
                    <div class="col s12">
                        @include('errors._check')
                        <h4 class="header">Cliente:</h4>
                        <strong>Nome</strong>: {{$order->client->user->name}}<br/>
                        <strong>Telefone</strong>: {{$order->client->phone}}
                        <h4 class="header">Endereço:</h4>
                        <strong>Rua:</strong> {{ $order->client->address }}<br/>
                        <strong>Cidade:</strong> {{ $order->client->city}}<br/>
                        <strong>Estado:</strong> {{$order->client->state}}<br/>
                        <strong>Telefone:</strong> {{$order->client->phone}}<br/><br/>
                    </div>

                    {!! Form::model($order, ['route'=>['admin.pedidos.update', $order->id], 'class' => 'col s12']) !!}

                    <div class="input-field col s12">
                        {!! Form::select('user_deliveryman_id', $deliveryMan, null, ['class'=>'form-control']) !!}
                        {!! Form::label('user_deliveryman_id', 'Entregador:') !!}
                    </div>

                    <div class="input-field col s12">
                        {!! Form::select('status', $list_status, null, ['class'=>'form-control']) !!}
                        {!! Form::label('status', 'Status:') !!}
                    </div>

                    <div class="row">
                        <div class="input-field col s12">
                            <button class="btn cyan waves-effect waves-light right" type="submit" name="action">Editar
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