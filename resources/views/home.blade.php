@extends('app')

@section('breadcrumb')
    <h5 class="breadcrumbs-title">Início</h5>
    <ol class="breadcrumb">
        <li><a href="index.html">Início</a></li>
    </ol>
@endsection

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-10 col-md-offset-1">
                <div class="panel panel-default">
                    <div class="panel-body">
                        Você está logado!
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection