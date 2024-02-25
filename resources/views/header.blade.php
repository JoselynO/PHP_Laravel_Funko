<header>
    <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
        <a class="navbar-brand mr-3" href="{{ route('funkos.index') }}">
            <img src="{{ asset('images/klipartz.com.png') }}" alt="Logo" class="d-inline-block align-text-top" height="70px" width="260px">
        </a>
        <button aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation" class="navbar-toggler"
                data-target="#navbarNav" data-toggle="collapse" type="button">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNav">
            <ul class="navbar-nav">
                <li class="nav-item">
                    @if (Route::has('login'))
                        @auth
                            <a href="{{ route ('home') }}" class="nav-link">Logout</a>
                        @else
                            <a href="{{ route ('login') }}" class="nav-link">Login</a>
                        @endauth
                    @endif
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="{{ route('funkos.index') }}">Funkos</a>
                </li>
                @if(auth()->check() && auth()->user()->role == "admin")
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('funkos.create') }}">Nuevo Funko</a>
                    </li>
                @endif

                @if(auth()->check() && auth()->user()->role == "admin")
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" data-bs-toggle="dropdown" href="#" role="button" aria-expanded="false">Categorias</a>
                    <ul class="dropdown-menu">
                        <li><a class="dropdown-item" href="{{ route('categorias.index') }}">Categorias</a></li>
                        <li><a class="dropdown-item" href="{{ route('categorias.create') }}">Nueva Categoria</a></li>
                    </ul>
                </li>
                @endif
            </ul>
            <ul class="navbar-nav ml-auto mr-5">
                <li class="nav-item">
                    <span class="navbar-text">
                        Usuario: {{ auth()->user()->name ?? 'invitado/a' }}
                    </span>
                </li>
            </ul>
            <form action="{{ route('funkos.index') }}" class="form-inline mr-2" method="get">
                <input type="text" class="form-control" id="search" name="search" placeholder="Nombre del Funko">
                <button class="btn btn-primary" type="submit">Buscar</button>
            </form>
        </div>
    </nav>
</header>
