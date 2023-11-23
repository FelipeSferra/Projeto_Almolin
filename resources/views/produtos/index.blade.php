@extends('components.body')
@section('title')
    Almolin - Produtos
@endsection
<style>

</style>
@section('content')
    <h2>Produtos</h2>
    <hr>
    <div class="row">
        <div class="col-md-auto mb-2">
            <a class="btn btn-outline-primary" href="{{ url('produtos/create') }}" role="button">
                <i class="fa-light fa-plus fa-sm"></i> Cadastrar</a>
        </div>
        <div class="col-md-auto mb-2" data-bs-toggle="modal" data-bs-target="#modalFilter">
            @if (count($produtos) > 0 && count($categorias) > 0)
                <a class="btn btn-outline-secondary" role="button">
                    <i class="fa-light fa-filter"></i> Filtrar</a>
            @else
                <a class="btn btn-outline-secondary disabled" role="button">
                    <i class="fa-light fa-filter"></i> Filtrar</a>
            @endif
        </div>
        @if (request()->filled('categoria') && request('categoria') != 0)
            <div class="col-md-auto ms-auto mb-2">
                <a  href="{{url('produtos')}}" class="btn btn-outline-warning">
                    <i class="fa-light fa-filter-slash"></i> Remover filtro
                </a>
            </div>
        @endif
    </div>
    @csrf
    <table class="table table-bordered table-sm">
        <thead class="text-center table-dark">
            <tr>
                <th scope="col">ID</th>
                <th scope="col">Descrição</th>
                <th scope="col">Custo</th>
                <th scope="col">QTD</th>
                <th scope="col">Categoria</th>
                <th scope="col">Armazém</th>
                <th class="col-3"></th>
            </tr>
        </thead>
        <tbody>
            @if (count($produtos) > 0)
                @foreach ($produtos as $produto)
                    <form name="formEdtProd" method="post" action="{{ url("produtos/$produto->id") }}">
                        @method('PUT')
                        @csrf
                        <tr>
                            <td>{{ $produto->id }}</td>
                            <td><input type="text" id="desc" name="desc" class="form-control"
                                    value="{{ $produto->desc }}" onclick="show_btn({{ $produto->id }})"></td>
                            <td><input type="number" id="custo" name="custo" step="0.01" class="form-control"
                                    value="{{ $produto->custo }}" onclick="show_btn({{ $produto->id }})"></td>
                            <td><input type="number" id="qtd" name="qtd" class="form-control"
                                    value="{{ $produto->qtd }}" onclick="show_btn({{ $produto->id }})"></td>
                            <td>
                                <select id="categoria" name="categoria" class="form-select"
                                    onclick="show_btn({{ $produto->id }})">
                                    @foreach ($categorias as $categoria)
                                        <option value="{{ $categoria->id }}"
                                            {{ $categoria->id === $produto->id_cat ? 'selected' : '' }}>
                                            {{ $categoria->desc }}
                                        </option>
                                    @endforeach
                                </select>
                            </td>
                            <td>
                                <select id="armazem" name="armazem" class="form-select"
                                    onclick="show_btn({{ $produto->id }})">
                                    @foreach ($armazens as $armazem)
                                        <option value="{{ $armazem->id }}"
                                            {{ $armazem->id === $produto->id_arm ? 'selected' : '' }}>{{ $armazem->desc }}
                                        </option>
                                    @endforeach
                                </select>
                            </td>
                            <td>
                                <div class="text-end">
                                    <button type="submit" class="btn btn-outline-success mx-2" id="{{ $produto->id }}"
                                        onclick="EditConfirm();" disabled><i class="fa-light fa-pen-to-square fa-sm"></i>
                                        Editar
                                    </button>
                                    <button type="button" class="btn btn-outline-danger mx-1 delete"
                                        onclick="Delete('{{ route('produtos.delete', ['id' => $produto->id]) }}');"><i
                                            class="fa-light fa-trash fa-sm"></i> Remover
                                    </button>
                                </div>
                            </td>
                        </tr>
                    </form>
                @endforeach
            @else
                <tr class="text-center">
                    <td colspan="7">Nenhum produto encontrado</td>
                </tr>
            @endif
        </tbody>
    </table>
    @if (count($produtos) > 0 && count($categorias) > 0)
        <div class="modal" id="modalFilter">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title">Filtrar dados</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <form name="formFilterProd" method="get" action="{{ url('produtos/') }}">
                            <div class="mb-3">
                                <label for="recipient-name" class="col-form-label">Categoria</label>
                                <select id="categoria" name="categoria" class="form-select">
                                    <option value="0" selected>Todas</option>
                                    @foreach ($categorias as $categoria)
                                        <option value="{{ $categoria->id }}">{{ $categoria->desc }}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancelar</button>
                                <button type="submit" class="btn btn-primary">Confirmar</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    @endif
@endsection
