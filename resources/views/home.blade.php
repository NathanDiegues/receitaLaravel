@extends('layouts.app')

@section('content')
<div class="container-fluid">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Receitas</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    <a href="{{route('receita.cadastrar')}}" class='btn btn-success mb-2'>Cadastrar nova receita</a>
                    <table class="table">
                            <thead>
                                <th>ID</th>
                                <th>Titulo</th>
                                <th>Ingredientes</th>
                                <th>Preparo</th>
                                <th>Criada em</th>
                                <th>Alterada em</th>
                                <th>Funções</th>
                            </thead>
                            <tbody>
                                    @if(count($receitas)>0)
                                    
                                    @foreach ($receitas as $receita)
                                    <tr>
                                    <td>{{$receita->id}}</td>
                                    <td>{{$receita->titulo}}</td>
                                    <td>{{$receita->ingredientes}}</td>
                                    <td>{{$receita->preparo}}</td>
                                    <td>{{$receita->created_at}}</td>
                                    <td>{{$receita->updated_at}}</td>
                                    <td>
                                        <a href="{{route('receita.ver', ['id' => $receita->id])}}" class="btn btn-primary">Ver</a>
                                        <a href="{{route('receita.editar', ['id' => $receita->id])}}" class="btn btn-warning">Editar</a>
                                        <a href="{{route('receita.deletar', ['id' => $receita->id])}}" class="btn btn-danger">Deletar</a>
                                    </td>
                                    </tr>
                                    @endforeach
                                    
                                    @endif
                                    
                            </tbody>
                        </table>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
