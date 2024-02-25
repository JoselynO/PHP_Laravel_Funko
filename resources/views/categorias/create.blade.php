@php use App\Models\Categoria; @endphp
@extends('main')
@section('title', 'Crear Categoria')
@section('style')
    <style>
        body {
            background-image: url({{ asset('images/halloween-4571712_1280.jpg') }});
            background-size: cover;
            background-repeat: no-repeat;
        }
    </style>
@endsection
@section('content')
    <h1 class="text-center mt-5" style="color: #ff4081; font-weight: bolder">¡Crea una Categoria!</h1>

    @if ($errors->any())
        <div class="alert alert-danger alert-dismissible">
            <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
        <br/>
    @endif
    <div class="container-fluid py-5 md-5" >
        <div class="row">
            <div class="col-md-6 offset-md-3 ">
    <form action="{{route('categorias.store')}}" method="post" id="create" style="margin-bottom: 2cm">
        @csrf
        <div class="form-group">
            <label for="name">Nombre:</label>
            <input class="form-control" id="name" name="nombre" type="text" required title="El nombre no puede estar vacio." pattern="^(?!\s*$).+">
        </div>
        <div class="text-center">
            <button class="btn btn-primary" type="submit">Crear</button>
            <a class="btn btn-secondary mx-2" href="{{route('categorias.index')}}">Volver</a>
        </div>
    </form>
            </div>
        </div>
    </div>
@endsection
