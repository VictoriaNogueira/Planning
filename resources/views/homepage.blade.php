@extends('layout')

@section('content')

<nav class="navbar navbar-light navbar-expand-lg mb-5">
    <div class="container">
        <a class="navbar-brand mr-auto" href="#">Planning</a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav"
            aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNav">
            <ul class="navbar-nav">
                @guest {{-- Verifica se está logado ou nao  --}}
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('login') }}">Login</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('register-user') }}">Cadastre-se</a>
                    </li>
                @else
                    <li class="nav-item">
                        <a class="nav-link" href="">Sair</a>
                    </li>
                @endguest
            </ul>
        </div>
    </div>
</nav>

@endsection
