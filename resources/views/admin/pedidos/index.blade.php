@extends('app')

@section('breadcrumb')
    <h5 class="breadcrumbs-title">Pedidos</h5>
    <ol class="breadcrumb">
        <li><a href="index.html">Início</a></li>
        <li class="active">Pedidos</li>
    </ol>
@endsection

@section('content')

    <div id="row-grouping" class="section">
        <div class="row">
            <div class="col s12 m12 19">
                <table id="data-table-simple" class="display" cellspacing="0" width="100%">
            <thead>
            <tr>
                <th>ID</th>
                <th>Data</th>
                <th>Total</th>
                <th>Entregador</th>
                <th>Itens</th>
                <th>Status</th>
                <th>Ação</th>
            </tr>
            </thead>
            <tbody>

            @foreach($orders as $order)
                <tr>
                    <td>#{{$order->id}}</td>
                    <td>{{$order->created_at}}</td>
                    <td>R${{$order->total}}</td>

                    <td>
                    @if ($order->deliveryman)
                        {{ $order->deliveryman->name }}
                    @else
                        --
                    @endif
                    </td>
                    <td>
                        @foreach($order->items as $index => $item)
                            {{ ($index ? ',' : '') . $item->product->name }}
                        @endforeach
                    </td>
                    <td>{{$list_status[$order->status]}}</td>
                    <td>
                        <a href="{{ route('admin.pedidos.editar', ['id'=>$order->id]) }}"
                           class="btn-floating waves-effect waves-light blue-grey btn-table"><i
                                    class="mdi-editor-mode-edit"></i></a>
                    </td>
                </tr>
            @endforeach
            </tbody>
                </table>
            </div>
        </div>
    </div>

@endsection