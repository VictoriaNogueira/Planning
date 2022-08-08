@extends('layout')

@section('header')
Oraganização financeira
@endsection

@section('content')
@include('partials.notify')

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
                <th scope="col">Ação</th>
            </tr>
        </thead>
        <tbody>
            @foreach($amounts as $value)
                <tr>
                    <td>{{ $value->description }}</td>
                    <td>{{ $value->value }}</td>
                    <td>{{ $value->name }}</td>
                    <td>
                        <form method="delete" action="/planning/{{ $value->id }}"
                            onsubmit=" return confirm('Deseja realmente remover este valor?')">
                            <button class="btn btn-danger btn-sm ">
                                <i class="fa-solid fa-trash-can"></i>
                            </button>

                        </form>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
    {{paginateLinks($amounts)}}

@endsection
