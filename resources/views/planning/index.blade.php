@extends('layout')

@section ('header')

@endsection

@section('content')
@include('partials.notify')

    {{-- Modal --}}
    <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModal">Adicionar</button>

    <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Adicionar valor</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form action="/planning" method="post">
                        @csrf
                        <div class="row">
                            <div class="col col-12">
                                <label for="description">Descrição</label>
                                <input type="text" class="form-control" name="description" id="description">
                            </div>
                            <div class="col col-12">
                                <label for="value">Valor</label>
                                <input type="float" class="form-control" name="value" id="value">
                            </div>
                            <div class="col col-12">
                                <p>Tipo</p>
                                {{-- <label for="category">Tipo</label> --}}
                                @foreach($categories as $categoria)
                                    <input type="radio" name="category" value="{{$categoria->id}}">{{$categoria -> name}}
                                @endforeach
                            </div>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancelar</button>
                            <button type="submit" class="btn btn-primary">Adicionar</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

    

    {{-- Lista --}}
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
