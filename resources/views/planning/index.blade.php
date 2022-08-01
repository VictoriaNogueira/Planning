@extends('layout')

@section('cabecalho')
Oraganização financeira
@endsection

@section('conteudo')
    

    <form action="/planning" method="post">
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
                @foreach($categories as $categoria)
                    <input type="radio" name="category" value="{{$categoria->id}}">{{$categoria -> name}}
                @endforeach

                {{-- <input type="radio" name="category" value="1">Entrada
                <input type="radio" name="category" value="2">Saída
                <input type="radio" name="category" value="3">Objetivo --}}

                {{-- <label for="category">Entrada </label>
                <label for="category">Saída </label>
                <label for="category">Objetivo </label> --}}
            </div>
        </div>
        <button type="submit" class="btn btn-primary mt-2">Adicionar</button>
    </form>

    <table class="table mt-2">
        <thead class="table table-dark mt-2">
            <tr>
                <th scope="col">Descrição</th>
                <th scope="col">Valor</th>
                <th scope="col">Tipo</th>
            </tr>
        </thead>
        <tbody>
        @foreach($amounts as $valor)
            <tr>
                <td>{{ $valor->description }}</td>
                <td>{{ $valor->value }}</td>
                <td>{{ $valor->category_id }}</td>
            </tr>
        @endforeach
        </tbody>
    </table>

@endsection
