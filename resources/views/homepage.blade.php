@extends('layout')

@section('content')

<div class="container-home">
    <div class="content-home">
        <div class="planning-home">
            <img src="/images/Planning-home.png"/>
        </div>
        <div class="logo-home">
            <img src="/images/Logo-home.png"/>
        </div>
    </div>
    <div class="container-cards-info">
        <div class="content-cards">
            <div class="card-info">
                <div class="img-card-info">
                    <img src="/images/info-1.png" class="img-card">
                </div>
                <div class= "title-info">
                    <b>Você gasta mais ou menos do que ganha?</b>
                </div>
                <div class= "text-info">
                    <p>É assustador saber que muitas pessoas nunca se fizeram
                    essa pergunta ou pararam pra refletir sobre esse assunto. </p>
                </div>
            </div>
            <div class="card-info">
                <div class="img-card-info">
                    <img src="/images/info-2.png" class="img-card">
                </div>
                <div class= "title-info">
                    <b>Conheça sua renda</b>
                </div>
                <div class= "text-info">
                    <p>Sabendo o valor que entra e sai da sua carteira,
                    você consegue definir o que precisa mudar e planeja
                    facilmente seus próximos objetivos.</p>
                </div>
            </div>
            <div class="card-info">
                <div class="img-card-info">
                    <img src="/images/info-3.png" class="img-card">
                </div>
                <div class= "title-info">
                    <b>Registre seus gastos</b>
                </div>
                <div class= "text-info">
                    <p>Anotando suas despesas fixas e variáveis,
                    você consegue se organizar melhor, estabelecer
                    metas e até montar sua reserva de emergência.</p>
                </div>
            </div>
            <div class="card-info">
                <div class="img-card-info">
                    <img src="/images/info-4.png" class="img-card">
                </div>
                <div class= "title-info">
                    <b>Priorize seus objetivos</b>
                </div>
                <div class= "text-info">
                    <p>Saber diferenciar desejos e necessidades é
                    fundamental para seu planejamento de curto e
                    (principalmente) de longo prazo. </p>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
