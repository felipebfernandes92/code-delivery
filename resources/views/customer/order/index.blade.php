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
                        <th>Total</th>
                        <th>Status</th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach($orders as $order)
                        <tr>
                            <td>{{ $order->id }}</td>
                            <td>{{ $order->total }}</td>
                            <td>{{ $order->status }}</td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>

    <div class="row">
        <a href="{{ route('customer.order.create') }}"
           class="btn-floating right btn-large waves-effect waves-light cyan darken-2 btn-add">
            <i class="mdi-content-add"></i>
        </a>
    </div>

@endsection