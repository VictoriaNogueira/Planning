@extends('layout')

@section('content')
@include('partials.notify')

<div class="container-dashboard">
    <div class="content-cards-amounts">
        <div class="card-amount">
            <div class="img-card-amounts">
                <img src="/images/card-in.png" class="img-card-amount">
            </div>
            <div class="texts-card">
                <div class= "title-card">
                    <b>Entradas</b>
                </div>
                <div class= "text-card">
                    {{-- <p>Testando de novo </p> --}}
                    {{$entradas}}
                </div>
            </div>
        </div>
        <div class="card-amount">
            <div class="img-card-amounts">
                <img src="../images/card-out.png" class="img-card-amount">
            </div>
            <div class="texts-card">
                <div class= "title-card">
                    <b>Saídas</b>
                </div>
                <div class= "text-card">
                    {{$saidas}}
                </div>
            </div>
        </div>
        <div class="card-amount">
            <div class="img-card-amounts">
                <img src="/images/card-invest.png" class="img-card-amount">
            </div>
            <div class="texts-card">
                <div class= "title-card">
                    <b>Investimento</b>
                </div>
                <div class= "text-card">
                    {{$investimentos}}
                </div>
            </div>
        </div>
        <div class="card-amount">
            <div class="img-card-amounts">
                <img src="/images/card-total.png" class="img-card-amount">
            </div>
            <div class="texts-card">
                <div class= "title-card">
                    <b>Total</b>
                </div>
                <div class= "text-card">
                    {{$total}}
                </div>
            </div>
        </div>
    </div>
</div>


@endsection
