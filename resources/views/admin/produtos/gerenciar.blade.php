@extends('app')

@section('breadcrumb')
    <h5 class="breadcrumbs-title">Produtos</h5>
    <ol class="breadcrumb">
        <li><a href="index.html">Início</a></li>
        <li>Produtos</li>
        <li class="active">{{ !isset($product) ? 'Adicionar' : 'Editar' }}</li>
    </ol>
@endsection

@section('content')
    @include('errors._check')
    <div class="row">
        <div class="col s12 m12 l8">
            <h4 class="header">{{ !isset($product) ? 'Adicionar' : 'Editar' }} produto {{ isset($product->name) ? $product->name : null }}</h4>
            <div class="card-panel">
                <div class="row">
                    @if(!isset($product))
                        {!! Form::open(['route' => 'admin.produtos.salvar', 'class' => 'col s12']) !!}
                    @else
                        {!! Form::model($product, ['route'=>['admin.produtos.update', $product->id], 'class' => 'col s12']) !!}
                    @endif
                    <div class="row">
                        <div class="input-field col s8">
                            {!! Form::label('Name', 'Nome') !!}
                            {!! Form::text('name', isset($product->name) ? $product->name : null) !!}
                        </div>

                        <div class="input-field col s4">
                            {!! Form::label('Price', 'Preço:') !!}
                            {!! Form::text('price', isset($product->price) ? $product->price : null, ['class'=>'form-control']) !!}
                        </div>
                    </div>
                    <div class="row">
                        <div class="input-field col s12">
                            {!! Form::select('category_id', $categories, null) !!}
                            {!! Form::label('Category', 'Categoria') !!}
                        </div>
                    </div>
                    <div class="row">
                        <div class="input-field col s12">
                            {!! Form::textarea('description', isset($product->description) ? $product->description : null, ['class'=>'materialize-textarea', 'length' => '120']) !!}
                            {!! Form::label('Description' , 'Descrição') !!}
                        </div>
                        <div class="row">
                            <div class="input-field col s12">
                                <button class="btn cyan waves-effect waves-light right" type="submit" name="action">{{ !isset($product) ? 'Adicionar' : 'Editar' }}
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