@php use App\Models\Funko; @endphp

@extends('main')

@section('title', 'Categorias')

@section('style')
    <style>
        body {
            background-image: url({{ asset('images/pexels-pixabay-36744.jpg') }});
            background-size: cover;
            background-repeat: no-repeat;
        }
    </style>
@endsection

@section('content')

    <h1 class="text-center mt-5 mb-5" style="font-weight: bolder">¿Cual es tu Categoria?</h1>
    @if(count($categorias) > 1)
        <table class="table table-dark mt-5">
            <thead>
            <tr>
                <th scope="col" class="text-center">Nombre</th>
                @if(auth()->check() && auth()->user()->role == 'admin')
                    <th scope="col" class="text-center">Seleccionar</th>
                @endif
            </tr>
            </thead>
            <tbody>
            @foreach ($categorias as $categoria)
                @if($categoria->id != 5)
                    <tr>
                        <td class="text-center">{{$categoria->nombre}}</td>
                        @if(auth()->check() && auth()->user()->role == 'admin')
                            <td class="text-center">
                                <div class="btn-group" role="group" aria-label="Seleccionar">
                                    <a class="btn btn-secondary" href="{{ route('categorias.edit', $categoria->id) }}">Editar</a>
                                    <form action="{{ route('categorias.destroy', $categoria->id) }}" method="POST" style="display: inline;">
                                        @csrf
                                        @method('DELETE')
                                        <button class="btn btn-danger" type="submit" onclick="return confirm('¿Estás seguro de que deseas eliminar esta categoria?');">
                                            Eliminar
                                        </button>
                                    </form>
                                </div>
                            </td>
                        @endif
                    </tr>
                @endif
            @endforeach
            </tbody>
        </table>
    @else
        <p class='lead'><em>No se ha encontrado datos de categorias.</em></p>
    @endif

    <div class="pagination-container">
        {{ $categorias->links('pagination::bootstrap-4') }}
    </div>
    @if(auth()->check() && auth()->user()->role == 'admin')
        <div class="text-center">
            <a class="btn btn-success" href={{ route('categorias.create') }}>Nueva Categoria</a>
        </div>
    @endif

@endsection
