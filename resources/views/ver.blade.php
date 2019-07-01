@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Receita: {{$receita->titulo}}</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif
                        <div class="col-12 mb-2">
                            <a class='btn btn-primary' href="{{route('receita')}}">Lista Completa</a>
                        </div>
                        <div class="col-12 mb-2">
                           <h1>{{$receita->titulo}}</h1>
                           <p>Criada em: {{$receita->created_at}}</p>
                           <p>Última atualização: {{$receita->updated_at}}</p>
                        </div>

                        <div class="col-12 mb-2">
                            <h3>Ingredientes:</h3>
                            <ul class='list'>
                                @foreach ($ingredientes as $ingrediente)
                                <li>{{$ingrediente}}</li>
                                @endforeach
                            </ul>
                        </div>

                        <div class="col-12 mb-2">
                            <h3>Modo de Preparo</h3>
                            <p>{{$receita->preparo}}</p>
                        </div>
                        
                </div>
            </div>
        </div>
    </div>
</div>

@endsection
