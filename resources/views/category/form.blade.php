@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Cadastro de Categorias') }}</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    @if ( Request::is('*/cadastro') )
                    <form action="{{ url('categoria/cadastro/update') }}/{{$category->id}}" method="POST">
                    @csrf
                    <div class="form-group row">
                        <label for="staticEmail" class="col-sm-3 col-form-label">Código: </label>
                        <div class="col-sm-9">
                            <input type="text" name="id" readonly  class="form-control-plaintext" value="{{ $category->id }}" >
                        </div>
                    </div>
                    <div class="form-group">
                        <label>Nome da Categoria</label>
                        <input name="name" type="text" class="form-control" value="{{ $category->name }}">
                    </div>
                    <button type="submit" class="btn btn-primary">Salvar</button>
                    <a href="{{ url('categoria') }}" class="btn btn-secundary"> Cancelar </a>
                    </form>

                    @else
                    <form action="{{ url('categoria/cadastro/store') }}" method="POST">
                    @csrf
                    <div class="form-group">
                        <label for="exampleInputEmail1">Nome da Categoria</label>
                        <input name="name" type="text" class="form-control" placeholder="Digite uma categoria">
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
