@extends('layout')

@section('content')
@include('partials.notify')

<div class="login">
    <div class="container-login">
        <div class="back">
            <a class="icon-back" href="{{ route('home') }}">
                <i class="fa-solid fa-arrow-left fa-2xl"></i>
            </a>
        </div>
        <div class="login-img">

            <img src="/images/Login-img.png" class="img-login"/>
        </div>
        <div class="form-login">
            <h2>Login</h2>
            <form method="POST" action="{{ route('login') }}">
                @csrf
                <div class="form-group">
                    <input type="text" placeholder="Email" id="email"
                    class="form-control" name="email">
                </div>
                <div class="form-group">
                    <input type="password" placeholder="Senha" id="password"
                    class="form-control" name="password">
                </div>
                <div class="form-button">
                    <button type="submit" class="btn-form">Entrar</button>
                </div>
                <div class="signup">
                    Ou <a href="{{ route('register-user') }}">cadastre-se </a>
                </div>
            </form>
        </div>
    </div>
</div>

@endsection
