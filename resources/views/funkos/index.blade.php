@php use App\Models\Funko; @endphp

@extends('main')

@section('title', 'Funkos by Joselyn')

@section('style')
<style>
    body{background-color: rgba(168, 215, 243, 0.63);
    }
</style>
@endsection
@section('content')

    <h1 class="text-center mt-5 mb-5" style="font-weight: bolder">¡Colecciona tu Funko AHORA!</h1>

<div class="container-fluid">
    <div id="demo" class="carousel slide" data-bs-ride="carousel">
        <div class="carousel-indicators">
            <button type="button" data-bs-target="#demo" data-bs-slide-to="0" class="active"></button>
            <button type="button" data-bs-target="#demo" data-bs-slide-to="1"  ></button>
            <button type="button" data-bs-target="#demo" data-bs-slide-to="2" ></button>
        </div>

        <div class="carousel-inner text-center" >
            <div class="carousel-item active" style="display: flex; justify-content: center; align-items: center">
                <img src="../images/mosaico-funko-universos-DISNEY-28022023.png" alt="DISNEY" class="d-block" style="width:30%">
            </div>
            <div class="carousel-item">
                <img src="../images/mosaico-funko-universos-DRAGON-BALL-28022023.png" alt="DRAGON-BALL" class="d-block" style="width:30%">
            </div>
            <div class="carousel-item">
                <img src="../images/mosaico-funko-universos-MARVEL-28022023.png" alt="MARVEL" class="d-block" style="width:30%">
            </div>
        </div>

        <button class="carousel-control-prev" type="button" data-bs-target="#demo" data-bs-slide="prev">
            <span class="carousel-control-prev-icon"></span>
        </button>
        <button class="carousel-control-next" type="button" data-bs-target="#demo" data-bs-slide="next">
            <span class="carousel-control-next-icon"></span>
        </button>
    </div>

    @if (count($funkos) > 0)
    <table class="table table-dark mt-5">
        <thead>
        <tr>
            <th>ID</th>
            <th>Nombre</th>
            <th>Precio</th>
            <th>Cantidad</th>
            <th>Imagen</th>
            <th>Seleccionar</th>
        </tr>
        </thead>
        <tbody>

        @foreach ($funkos as $funko)
        <tr>
            <td>{{ $funko->id }}</td>
            <td>{{ $funko->nombre }}</td>
            <td>{{ $funko->precio }}</td>
            <td>{{ $funko->cantidad }}</td>
            <td>
                @if($funko->imagen != Funko::$IMAGE_DEFAULT)
                    <img alt="Imagen del funko" height="50" src="{{ asset('storage/' . $funko->imagen) }}" onerror="this.onerror=null; this.src='{{$funko->imagen}}'"
                         width="50">
                @else
                    <img alt="Imagen por defecto" height="50" src="{{ Funko::$IMAGE_DEFAULT }}"
                         width="50">
                @endif
            </td>
            <td>
                <a class="btn btn-primary btn-sm"
                   href="{{ route('funkos.show', $funko->id) }}">Detalles</a>

                @if(auth()->check() && auth()->user()->role == "admin")
                <a class="btn btn-secondary btn-sm"
                   href="{{ route('funkos.edit', $funko->id) }}">Editar</a>
                <a class="btn btn-info btn-sm"
                   href="{{ route('funkos.editImage', $funko->id) }}">Imagen</a>
                <form action="{{ route('funkos.destroy', $funko->id) }}" method="POST"
                      style="display: inline;">
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="btn btn-danger btn-sm"
                            onclick="return confirm('¿Estás seguro de que deseas borrar este funko?')">Borrar
                    </button>
                </form>
                @endif
            </td>
        </tr>
        @endforeach
        </tbody>
    </table>

    @else
        <p class='lead'><em>No se ha encontrado la informaciones de funkos.</em></p>
    @endif
    <div class="pagination-container" style="margin-bottom: 4cm">
        {{ $funkos->links('pagination::bootstrap-4') }}
    </div>
    @if(auth()->check() && auth()->user()->role == "admin")
    <div class="d-flex justify-content-center mt-4 " style="margin-bottom: 3cm">
        <a class="btn btn-success"  href={{ route('funkos.create') }}>Nuevo Producto</a>
    </div>
    @endif


</div>
@endsection
