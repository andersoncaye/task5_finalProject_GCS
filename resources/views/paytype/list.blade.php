@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">{{ __('Lista de Tipos de Pagamentos') }}</div>

                    <div class="card-body">
                        @if (session('status'))
                            <div class="alert alert-success" role="alert">
                                {{ session('status') }}
                            </div>
                        @endif

                        <a href ="{{ url('tipo_pagamento/novo') }}" class="btn btn-success">Nova Tipo de Pagamento</a>
                        <p> </p>
                        <table class="table table-hover table-sm table-bordered">
                            <thead>
                            <tr>
                                <th scope="col">Código</th>
                                <th scope="col">Nome do Tipo de Pagamento</th>
                                <th scope="col" colspan="2">Ação</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach ( $paytypes as $u)
                                <tr>
                                    <th scope="row">{{ $u-> id}}</th>
                                    <td>{{ $u-> name}}</td>
                                    <td> <a href="tipo_pagamento/{{$u->id}}/cadastro" class="btn btn-info btn-sm">Editar</a> </td>
                                    <td>
                                        <form action="{{ url('tipo_pagamento/cadastro/delete') }}/{{$u->id}}" method="POST">
                                            @csrf
                                            @method('delete')
                                            <button class="btn btn-danger btn-sm">Deletar</button>
                                        </form>
                                    </td>
                            @endforeach
                            </tbody>
                        </table>


                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
