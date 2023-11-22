@extends('components.body')
@section('title')
    Almolin - Categorias
@endsection
@section('content')
    <h2>Categorias</h2>
    <hr>
    <div class="col-md-2 mb-2">
        <a class="btn btn-outline-primary" href="{{ url('categorias/create') }}" role="button"><i
                class="fa-light fa-plus fa-sm"></i> Cadastrar</a>
    </div>
    @csrf
    <table class="table table-bordered table-sm">
        <thead class="text-center table-dark">
            <tr>
                <th scope="col">ID</th>
                <th scope="col">Nome</th>
                <th class="col-3"></th>
            </tr>
        </thead>
        <tbody>
            @if (count($categorias) > 0)
                @foreach ($categorias as $categoria)
                    <form name="formEdtCat" method="post" action="{{ url("categorias/$categoria->id") }}">
                        @method('PUT')
                        @csrf
                        <tr>
                            <td>{{ $categoria->id }}</td>
                            <td>
                                <input type="text" id="descr" name="descr" class="form-control"
                                    value="{{ $categoria->desc }}" onclick="show_btn({{ $categoria->id }})">
                            </td>
                            <td>
                                <div class="text-end">
                                    <button type="submit" class="btn btn-outline-success mx-2" id="{{ $categoria->id }}"
                                        onclick="EditConfirm();" disabled><i class="fa-light fa-pen-to-square fa-sm"></i>
                                        Editar
                                    </button>
                                    <button type="button" class="btn btn-outline-danger mx-1 delete"
                                        onclick="Delete('{{ route('categorias.delete', ['id' => $categoria->id]) }}');"><i
                                            class="fa-light fa-trash fa-sm"></i> Remover</button>
                                </div>
                            </td>
                        </tr>
                    </form>
                @endforeach
            @else
                <tr class="text-center">
                    <td colspan="3">Nenhuma categoria cadastrada</td>
                </tr>
            @endif
        </tbody>
    </table>
@endsection
