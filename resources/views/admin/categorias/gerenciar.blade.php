@extends('app')

@section('breadcrumb')
    <h5 class="breadcrumbs-title">Categorias</h5>
    <ol class="breadcrumb">
        <li><a href="index.html">Início</a></li>
        <li>Categorias</li>
        <li class="active">{{ !isset($category) ? 'Adicionar' : 'Editar' }}</li>
    </ol>
@endsection

@section('content')
    @include('errors._check')
    <div class="row">
        <div class="col s12 m12 l8">
            <h4 class="header">{{ !isset($category) ? 'Adicionar' : 'Editar' }} categoria {{ isset($category->name) ? $category->name : null}}</h4>
            <div class="card-panel">
                <div class="row">

                    @if(!isset($category))
                        {!! Form::open(['route' => 'admin.categorias.salvar', 'class' => 'col s12']) !!}
                    @else
                        {!! Form::model($category, ['route'=>['admin.categorias.update', $category->id], 'class' => 'col s12']) !!}
                    @endif

                    <div class="row">
                        <div class="input-field col s12">
                            {!! Form::label('Name', 'Nome:') !!}
                            {!! Form::text('name', isset($category->name) ? $category->name : null) !!}
                        </div>
                    </div>

                    <div class="row">
                        <div class="input-field col s12">
                            <button class="btn cyan waves-effect waves-light right" type="submit" name="action">
                                {{ !isset($category) ? 'Adicionar' : 'Editar' }}
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