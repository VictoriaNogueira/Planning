@extends('layout')

@section('content')
@include('partials.notify')

<div class="create-user">
    <div class="container-create-user">
        <div class="back">
            <a class="icon-back" href="{{ route('home') }}">
                <i class="fa-solid fa-arrow-left fa-2xl"></i>
            </a>
        </div>
        <div class="create-user-img">
            <img src="/images/Logo-create-user.png" class="img-create-user"/>
        </div>
        <div class="form-user">
            <h2>Cadastro de usuário</h2>
            <form action="" method="POST">
                @csrf
                <div class="form-group-user">
                    <input type="text" placeholder="Nome" id="name" class="form-control" name="name" value="{{old('name')}}">
                </div>
                <div class="form-group-user">
                    <input type="text" placeholder="Email" id="email" class="form-control" name="email" value="{{old('email')}}">
                </div>
                <div class="form-group-user">
                    <input type="password" placeholder="Senha" id="password" class="form-control" name="password">
                </div>
                <div class="form-group-user">
                    <input type="password" placeholder="Confirme sua senha" id="password_confirmation" class="form-control" name="password_confirmation">
                </div>
                <div class="form-group-user">
                    <b>Qual valor você deseja alcançar?</b>
                    <input type="number" placeholder="Objetivo" id="name" class="form-control" name="goal" value="{{old('goal')}}">
                </div>
                <div class="form-button-create">
                    <a href="{{ route('home') }}">
                        <button type="button" class="btn-cancel">Cancelar</button>
                    </a>
                    <button type="submit" class="btn-register">Cadastrar</button>
                </div>
            </form>
        </div>
    </div>
</div>

@endsection
