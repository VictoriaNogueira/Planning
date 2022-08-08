@extends('layout')

@section('content')
@include('partials.notify')

<main class="login-form">
    <div class="cotainer">
        <div class="row justify-content-center">
            <div class="col-md-4">
                <div class="card">
                    <h3 class="card-header text-center">Cadastro de usuário</h3>
                    <div class="card-body">

                        <form action="" method="POST">
                            @csrf
                            <div class="form-group mb-3">
                                <input type="text" placeholder="Nome" id="name" class="form-control" name="name" autofocus>
                            </div>
                            <div class="form-group mb-3">
                                <input type="text" placeholder="Email" id="email" class="form-control" name="email" autofocus>
                            </div>
                            <div class="form-group mb-3">
                                <input type="password" placeholder="Senha" id="password" class="form-control" name="password">
                            </div>
                            <div class="form-group mb-3">
                                <input type="password" placeholder="Confirme sua senha" id="password_confirmation" class="form-control" name="password_confirmation">
                            </div>
                            <div class="form-group mb-3">
                                <p>** Qual valor você deseja alcançar?</p>
                                <input type="number" placeholder="Objetivo" id="name" class="form-control" name="goal" autofocus>
                            </div>

                            <div class="d-grid mx-auto">
                                <button type="submit" class="btn btn-dark btn-block">Enviar</button>
                            </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</main>

@endsection
