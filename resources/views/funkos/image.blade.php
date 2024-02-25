@php use App\Models\Funko; @endphp

@extends('main')

@section('title', 'Editar Imagen de Funko')
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
    <h1 class="text-center mt-5" style="color: #ff4081; font-weight: bolder">¡Edita la Imagen del Funko!</h1>

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


    <div class="container-fluid" style="margin-bottom: 4cm">
        <div class="card mx-auto my-5 col-md-6">
            <div class="card-header text-center">
                <h1>{{$funko->nombre}}</h1>
            </div>
            <div class="card-body">
                <dl class="row">
                    <dt class="col-sm-2">Image:</dt>
                    <dd class="col-sm-10">@if($funko->imagen != Funko::$IMAGE_DEFAULT)
                            <img alt="Funko Image" class="img-fluid" src="{{asset('storage/' . $funko->imagen)}}" onerror="this.onerror=null; this.src='{{$funko->imagen}}'">
                        @else
                            <img alt="Funko Image" class="img-fluid" src="{{Funko::$IMAGE_DEFAULT}}">
                        @endif
                    </dd>
                </dl>

                <form action="{{route("funkos.updateImage", $funko->id)}}" enctype="multipart/form-data" method="post" >
                    @csrf
                    @method('PATCH')
                    <div class="form-group">
                        <label for="imagen">Imagen Nueva:</label>
                        <input accept="img/*" class="form-control-file" id="imagen" name="imagen" required type="file">
                        <small class="text-danger"></small>
                    </div>

                    <button class="btn btn-primary" type="submit">Actualizar</button>
                    <a class="btn btn-secondary mx-2" href="{{route('funkos.index')}}">Volver</a>
                </form>
            </div>
        </div>
@endsection
