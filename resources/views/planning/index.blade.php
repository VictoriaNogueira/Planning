@extends('layout')

@section('cabecalho')
Oraganização financeira
@endsection

@section('conteudo')


<form method="post">
    @csrf
    <div class="row">
        <div class="col col-7">
            <label for="description">Descrição</label>
            <input type="text" class="form-control" name="description" id="description">
        </div>

        <div class="col col-2">
            <label for="value">Valor</label>
            <input type="float" class="form-control" name="value" id="value">
        </div>

        <div class="col col-3">
            <p>Tipo</p>
            <input type="radio" id="1" name="category" value="input">
            <label for="category">Entrada </label>
            <input type="radio" id="2" name="category" value="output">
            <label for="category">Saída </label>
            <input type="radio" id="3" name="category" value="goal">
            <label for="category">Objetivo </label>
        </div>
    </div>
    <button class="btn btn-primary mt-2">Adicionar</button>
</form>


{{-- <ul class="list-group">
    @foreach($amount as $amount)
    <li class="list-group-item d-flex justify-content-between align-items-center">
        {{ $amount->value }}
        <form method="get" action="amount/delete/{{ $amount->id }}"
            onsubmit="return confirm('Deseja realmente remover este valor?')">
            <button class="btn btn-danger btn-sm">DEL</button>
        </form>
    </li>
    @endforeach
</ul> --}}

{{-- <table class="table-dark">
    @foreach($amounts as $amount)
    <tr class="table-light d-flex justify-content-between align-items-center">


    </tr>
</table> --}}
@endsection
