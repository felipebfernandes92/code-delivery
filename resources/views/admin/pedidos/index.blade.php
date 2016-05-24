@extends('app')

@section('content')

    <div class="container">
        <h3>Pedidos</h3>

        <table class="table table-bordered">
            <thead>
            <tr>
                <th>ID</th>
                <th>Data</th>
                <th>Valor</th>
                <th>Entregador</th>
                <th>Itens</th>
                <th>Status</th>
                <th>Ação</th>
            </tr>
            </thead>
            <tbody>

            @foreach($orders as $order)
                <tr>
                    <td>{{$order->id}}</td>
                    <td>{{$order->created_at}}</td>
                    <td>R${{$order->total}}</td>

                    <td>
                    @if ($order->deliveryman)
                        {{ $order->deliveryman->name }}
                    @endif
                    </td>
                    <td>
                        @foreach($order->items as $item)
                            - {{ $item->product->name }}<br/>
                        @endforeach
                    </td>
                    <td>{{$list_status[$order->status]}}</td>
                    <td><a href="{{ route('admin.pedidos.editar', ['id'=>$order->id]) }}" class="btn btn-default btn-sm"> Editar</a></td>
                </tr>
            @endforeach
            </tbody>
        </table>

        {!! $orders->render()  !!}
    </div>

@endsection