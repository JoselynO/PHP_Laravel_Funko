@php use App\Models\Funko; @endphp

@extends('main')

@section('title', 'Crear Funko')

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

    <h1 class="text-center mt-5" style="color: #ff4081; font-weight: bolder">¡Crea tu Funko!</h1>
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
            <form action="{{ route("funkos.store") }}" method="post"  id="create" style="margin-bottom: 2cm">
             @csrf
                <div class="form-group">
                    <label for="name">Nombre:</label>
                    <input class="form-control" id="name" name="nombre" type="text" required title="El nombre no puede estar vacio." pattern="^(?!\s*$).+">
                </div>
                <div class="form-group">
                    <label for="precio">Precio:</label>
                    <input class="form-control" id="precio" name="precio" type="number" required
                      min="1.0" step="0.01"  value="0">
                </div>
                <div class="form-group">
                    <label for="cantidad">Cantidad:</label>
                    <input class="form-control" id="cantidad" name="cantidad" type="number" required
                      min="1" value="0">
                </div>

                <div class="form-group">
                    <label for="categoria">Categoría:</label>
                    <select class="form-control" id="categoria" name="categoria" required>
                        <option value="">Seleccione una categoría</option>
                        @foreach($categorias as $categoria)
                            <option value="{{ $categoria->id }}">{{ $categoria->nombre }}</option>
                        @endforeach
                    </select>
                </div>

                <div class="buttons-container d-flex justify-content-between">
                    <button class="btn btn-primary " type="submit">Crear</button>
                    <a class="btn btn-secondary mx-2" href="{{ route('funkos.index') }}">Volver</a>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection
