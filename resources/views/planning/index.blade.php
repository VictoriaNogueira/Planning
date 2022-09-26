@extends('layout')

@section('content')
@include('partials.notify')


    <div class="welcome">
        <div class="welcome-user">
            <h3>Olá, <span>{{Auth::user()->name}}</span></h3>
            <i class="fa-solid fa-calendar-days"></i>
            <small><i> {{date('d/m/Y')}}</i></small>

        </div>
        {{-- Modal --}}
        <button type="button" class="btn-add-value" data-toggle="modal" data-target="#exampleModal">Adicionar valor</button>

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
                            <div class="form-add-value">
                                <div class="form-group">
                                    <input type="text" placeholder="Descrição" class="form-control" name="description" id="description" value="{{old('description')}}">
                                </div>
                                <div class="form-group">
                                    <input type="float" placeholder="Valor" class="form-control" name="value" id="value" value="{{old('value')}}">
                                </div>
                                <div class="form-type">
                                    <label for="category">Categoria</label><br>
                                    @foreach($categories as $categoria)
                                        <input type="radio" name="category" value="{{$categoria->id}}">{{$categoria -> name}}
                                    @endforeach
                                </div>
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn-cancelar" data-dismiss="modal">Cancelar</button>
                                <button type="submit" class="btn-add">Adicionar</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>

{{-- Lista --}}
    <div class="listagem">
        <div class="container-table">
            <table class="table">
                <thead class="table-head">
                    <tr>
                        <th scope="col">Descrição</th>
                        <th scope="col">Valor</th>
                        <th scope="col">Tipo</th>
                        <th scope="col">Inserção</th>
                        <th scope="col">Ação</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($amounts as $value)
                        <tr>
                            <td>{{ $value->description }}</td>
                            <td>R$ {{ $value->value }}</td>
                            <td>{{ $value->name }}</td>
                            <td>{{ $value->created_at->format('d/m/Y')}}</td>
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
        </div>
    </div>


@endsection
