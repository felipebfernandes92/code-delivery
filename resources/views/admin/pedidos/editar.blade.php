@extends('app')

@section('content')

    <div class="container">
        <h3>Editando pedido {{$order->id}} - R${{$order->total}}</h3>

        @include('errors._check')

        <h4>Cliente:</h4>
        <strong>Nome</strong>: {{$order->client->user->name}}<br/>
        <strong>Telefone</strong>: {{$order->client->phone}}
        <h4>Endereço:</h4>
        <strong>Rua:</strong> {{ $order->client->address }}<br/>
        <strong>Cidade:</strong> {{ $order->client->city}}<br/>
        <strong>Estado:</strong> {{$order->client->state}}<br/>
        <strong>Telefone:</strong> {{$order->client->phone}}<br/><br/>

        {!! Form::model($order, ['route'=>['admin.pedidos.update', $order->id]]) !!}

        <div class="form-group">
            {!! Form::label('user_deliveryman_id', 'Entregador:') !!}
            {!! Form::select('user_deliveryman_id', $deliveryMan, null, ['class'=>'form-control']) !!}
        </div>

        <div class="form-group">
            {!! Form::label('status', 'Status:') !!}
            {!! Form::select('status', $list_status, null, ['class'=>'form-control']) !!}
        </div>

        <div class="form-group">
            {!! Form::submit('Editar', ['class'=>'btn btn-primary']) !!}
        </div>

        {!! Form::close() !!}

    </div>

@endsection