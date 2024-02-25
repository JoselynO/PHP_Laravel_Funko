@php use App\Models\Funko; @endphp

@extends('main')

@section('title', 'Detalles Funko')

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
    <h1 class="text-center mt-5" style="color: #ff4081; font-weight: bolder">¡Detalles de Funko!</h1>
<div class="container-fluid" style="margin-top: 2cm; margin-bottom: 4cm">
    <div class="card mx-auto my-5 col-md-6 " >
        <div class="card-header text-center">
            <h1>{{$funko->nombre}}</h1>
        </div>
        <div class="card-body">
            <div class="row">
                <div class="col-sm-6">
                    <dl>
                        <dt>ID:</dt>
                        <dd>{{ $funko->id }}</dd>
                        <dt>Cantidad:</dt>
                        <dd>{{ $funko->cantidad }} uds</dd>
                        <dt>Precio:</dt>
                        <dd>{{ $funko->precio }}€</dd>
                        <dt>Categoria:</dt>
                        <dd>{{ $funko->categoria->nombre }}</dd>
                    </dl>
                </div>
                <div class="col-sm-6">
                    @if($funko->imagen != Funko::$IMAGE_DEFAULT)
                        <img alt="Imagen del funko" class="img-fluid" src="{{ asset('storage/' . $funko->imagen) }}" onerror="this.onerror=null; this.src='{{$funko->imagen}}'">
                    @else
                        <img alt="Imagen por defecto" class="img-fluid" src="{{ Funko::$IMAGE_DEFAULT }}">
                    @endif
                </div>
            </div>
        </div>
        <div class="card-footer">
            <a class="btn btn-primary" href="{{ route('funkos.index') }}">Volver</a>
        </div>
    </div>
</div>

@endsection
