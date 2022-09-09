@extends('layout')

@section('content')
@include('partials.notify')

{{-- Cards --}}
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

{{-- Gráficos --}}

<div class="charts">
    {{-- boxes --}}
    <div class="chartBox">
        <canvas id="pieChart"></canvas>
    </div>
    <div class="chartBoxGoal">
    <canvas id="goalChart"></canvas>
    </div>

    {{-- scripts --}}
    <script>
        // setup1
        const data = {
            labels: ['Entradas', 'Saídas', 'Investimentos'],
            datasets: [{
                label: 'R$',
                data: [ {{$entradas}}, {{$saidas}}, {{$investimentos}} ],
                backgroundColor: [
                    'rgba(75, 192, 192, 1)',
                    'rgba(255, 99, 132, 1)',
                    'rgba(255, 159, 64, 1)',
                ],
                borderColor: [
                    'rgba(75, 192, 192, 1)',
                    'rgba(255, 99, 132, 1)',
                    'rgba(255, 159, 64, 1)',
                ],
                borderWidth: 1
            }],
        };

        //config1
        const config = {
            type: 'pie',
            data,
            options: {}
        };

        //render template1
        const pieChart = new Chart(
            document.getElementById('pieChart'),
            config
        );

        //setup2
        const dataGoal = {
            labels: [
                'Red',
                'Blue'
            ],
            datasets: [{
                label: 'My Goal',
                data: [{{$goal}}, {{$investimentos}}],
                backgroundColor: [
                    'rgb(255, 99, 132)',
                    'rgb(54, 162, 235)'
                ],
                hoverOffset: 4
            }]
        };

        // config2
        const configGoalChart = {
            type: 'doughnut',
            data: dataGoal,
            options: {}
        };

        // render template2
        const goalChart = new Chart(
            document.getElementById('goalChart'),
            configGoalChart
        );
    </script>
</div>


@endsection
