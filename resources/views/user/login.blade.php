@extends('layout')

@section('content')
@include('partials.notify')

<main class="login-form">
    <div class="cotainer">
        <div class="row justify-content-center">
            <div class="col-md-4">
                <div class="card">

                    {{-- @if(\Session::has('messages'))
                        <div class="alert alert-info">
                            {{\Session::get('message')}}
                        </div>
                    @endif --}}

                    <h3 class="card-header text-center">Login</h3>
                    <div class="card-body">
                        {{-- <form method="POST" action="/login"> --}}
                        <form method="POST" action="{{ route('login') }}">
                            @csrf
                            <div class="form-group mb-3">
                                <input type="text" placeholder="Email" id="email" class="form-control" name="email"autofocus>
                            </div>
                            <div class="form-group mb-3">
                                <input type="password" placeholder="Senha" id="password" class="form-control" name="password">
                            </div>
                            <div class="d-grid mx-auto">
                                <button type="submit" class="btn btn-dark btn-block">Entrar</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</main>

@endsection
