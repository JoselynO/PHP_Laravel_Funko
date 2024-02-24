@php use App\Models\Funko; @endphp

@extends('main')

@section('title', 'Editar Funko')

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

    <h1 class="text-center mt-5" style="color: #ff4081; font-weight: bolder">¡Actualiza tu Funko!</h1>
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

<div class="container-fluid">
    <div class="row">
        <div class="col-md-6 offset-md-3 mt-5">
            <form action="{{ route("funkos.update", $funko->id) }}" method="post" id="create" style="margin-bottom: 3cm">
                @csrf
                @method('PUT')

                <div class="form-group">
                    <label for="nombre">Nombre:</label>
                    <input class="form-control" id="nombre" name="nombre" type="text" required
                           value="{{$funko->nombre}}" title="El nombre no puede estar vacio." pattern="^(?!\s*$).+">
                </div>
                <div class="form-group">
                    <label for="cantidad">Cantidad:</label>
                    <input class="form-control" id="cantidad" name="cantidad" type="number" min="0" step="1" required
                           value="{{$funko->cantidad}}">
                </div>
                <div class="form-group">
                    <label for="precio">Precio:</label>
                    <input class="form-control" id="precio" name="precio" type="number" step="0.01" min="0.0" required
                           value="{{$funko->precio}}">

                </div>

                <div class="form-group">
                    <label for="categoria">Categoria:</label>
                    <select class="form-control" id="categoria" name="categoria">
                        <option>Seleccione una categoría</option>
                        @foreach($categorias as $categoria)
                            <option @if($funko->categoria->id == $categoria->id) selected
                                    @endif value="{{ $categoria->id }}">{{ $categoria->nombre }}</option>
                        @endforeach
                    </select>
                </div>

                <div class="buttons-container d-flex justify-content-between">
                    <button class="btn btn-primary" type="submit">Actualizar</button>
                    <a class="btn btn-secondary mx-2" href="{{ route('funkos.index') }}">Volver</a>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection
