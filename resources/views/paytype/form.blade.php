@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">{{ __('Cadastro de Tipos de Pagamentos') }}</div>

                    <div class="card-body">
                        @if (session('status'))
                            <div class="alert alert-success" role="alert">
                                {{ session('status') }}
                            </div>
                        @endif

                        @if ( Request::is('*/cadastro') )
                            <form action="{{ url('tipo_pagamento/cadastro/update') }}/{{$paytype->id}}" method="POST">
                                @csrf
                                <div class="form-group row">
                                    <label for="staticEmail" class="col-sm-3 col-form-label">Código: </label>
                                    <div class="col-sm-9">
                                        <input type="text" name="id" readonly  class="form-control-plaintext" value="{{ $paytype->id }}" >
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label>Nome do Tipo de Pagamento</label>
                                    <input name="name" type="text" class="form-control" value="{{ $paytype->name }}">
                                </div>
                                <button type="submit" class="btn btn-primary">Salvar</button>
                                <a href="{{ url('tipo_pagamento') }}" class="btn btn-secundary"> Cancelar </a>
                            </form>

                        @else
                            <form action="{{ url('tipo_pagamento/cadastro/store') }}" method="POST">
                                @csrf
                                <div class="form-group">
                                    <label for="exampleInputEmail1">Nome do Tipo de Pagamento</label>
                                    <input name="name" type="text" class="form-control" placeholder="Digite um tipo de pagamento">
                                </div>
                                <button type="submit" class="btn btn-primary">Salvar</button>
                            </form>

                        @endif

                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
