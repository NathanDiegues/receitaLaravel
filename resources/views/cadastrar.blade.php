@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Cadastrar Receita</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif
                    <div class="col-12 mb-2">
                            <a class='btn btn-primary' href="{{route('receita')}}">Voltar</a>
                        </div>
                    @if(isset($receita))
                    <form action="{{route('receita.alterar', ['id' => $receita->id])}}" method="POST" enctype="multipart/form-data">
                    @else
                    <form action="{{route('receita.registrar')}}" method="POST" enctype="multipart/form-data">
                    @endif
                    @csrf
                        <div class="col-12 mb-2">
                            <label for="titulo">Titulo</label>
                            <input type="text" name='titulo' value="@if(isset($receita)) {{$receita->titulo}} @endif" class='form-control'>
                            @error('titulo')<span>{{$message}}</span> @enderror
                        </div>

                        <div class="col-12 mb-2">
                            <label for="ingrediente[]">Ingredientes</label>
                            @if(isset($receita))
                                @foreach ($ingredientes as $ingrediente)
                                <div class='d-flex mb-2'><input type='text' name='ingrediente[]' value="{{$ingrediente}}" class='form-control'><button class='btn btn-danger remover'>Remover ingrediente</button></div>
                                @endforeach
                            @else
                            <div class='d-flex mb-2'><input type='text' name='ingrediente[]' value="" class='form-control'><button class='btn btn-danger remover'>Remover ingrediente</button></div>
                            @endif
                            <button id='add' class='btn btn-primary'>Adicionar ingrediente</button>
                            @error('ingrediente')<span>{{$message}}</span> @enderror
                        </div>

                        <div class="col-12 mb-2">
                            <label for="preparo">Modo de Preparo</label>
                            <textarea name='preparo' class='form-control'>@if(isset($receita)) {{$receita->preparo}} @endif</textarea>
                            @error('preparo')<span>{{$message}}</span> @enderror
                        </div>
                        
                        <div class="col-12 mb-2">
                            <button class="btn btn-success">@if(isset($receita))Alterar @else Cadastrar @endif</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

<script>
    $(document).ready(function(){
        $('#add').click(function(e){
            e.preventDefault();
            $(this).before("<div class='d-flex mb-2'><input type='text' name='ingrediente[]' value='' class='form-control'><button class='btn btn-danger remover'>Remover ingrediente</button></div>");
        });

        $('.remover').click(function(e){
            $(this).parent().remove();
        });
    });
</script>
@endsection
