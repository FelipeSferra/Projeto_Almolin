@extends('components.body')
@section('title')
    Almolin - Armazens
@endsection
@section('content')
    <h2>Armazens</h2>
    <hr>
    <div class="col-md-2 mb-2">
        <a class="btn btn-outline-primary" href="{{ url('armazens/create') }}" role="button"><i
                class="fa-light fa-plus fa-sm"></i> Cadastrar</a>
    </div>
    @csrf
    <table class="table table-bordered table-sm">
        <thead class="text-center table-dark">
            <tr>
                <th scope="col">ID</th>
                <th scope="col">Descrição</th>
                <th scope="col">Empresa</th>
                <th scope="col">Cidade</th>
                <th scope="col">Endereço</th>
                <th scope="col">Bairro</th>
                <th scope="col">Número</th>
                <th class="col-3"></th>
            </tr>
        </thead>
        <tbody>
            @if (count($armazens) > 0)
                @foreach ($armazens as $armazem)
                    <form name="formEdtArm" method="post" action="{{ url("armazens/$armazem->id") }}">
                        @method('PUT')
                        @csrf
                        <tr>
                            <td>{{ $armazem->id }}</td>
                            <td>
                                <input type="text" id="desc" name="desc" class="form-control"
                                    value="{{ $armazem->desc }}" onclick="show_btn({{ $armazem->id }})">
                            </td>
                            <td>
                                <select id="emp" name="emp" class="form-select"
                                    onclick="show_btn({{ $armazem->id }})">
                                    @foreach ($empresas as $empresa)
                                        <option value="{{ $empresa->id }}"
                                            {{ $empresa->id === $armazem->id_emp ? 'selected' : '' }}>{{ $empresa->desc }}
                                        </option>
                                    @endforeach
                                </select>
                            </td>
                            <td>
                                <input type="text" id="" name="cidade" class="form-control"
                                    value="{{ $armazem->cidade }}" onclick="show_btn({{ $armazem->id }})">
                            </td>
                            <td>
                                <input type="text" id="endereco" name="endereco" class="form-control"
                                    value="{{ $armazem->endereco }}" onclick="show_btn({{ $armazem->id }})">
                            </td>
                            <td>
                                <input type="text" id="bairro" name="bairro" class="form-control"
                                    value="{{ $armazem->bairro }}" onclick="show_btn({{ $armazem->id }})">
                            </td>
                            <td>
                                <input type="text" id="num" name="num" class="form-control"
                                    value="{{ $armazem->numero }}" onclick="show_btn({{ $armazem->id }})">
                            </td>
                            <td>
                                <div class="text-end">
                                    <button type="submit" class="btn btn-outline-success mx-2" id="{{ $armazem->id }}"
                                        onclick="EditConfirm();" disabled><i class="fa-light fa-pen-to-square fa-sm"></i>
                                        Editar
                                    </button>
                                    <button type="button" class="btn btn-outline-danger mx-1 delete"
                                        onclick="Delete('{{ route('armazens.delete', ['id' => $armazem->id]) }}');"><i
                                            class="fa-light fa-trash fa-sm"></i> Remover</button>
                                </div>
                            </td>
                        </tr>
                    </form>
                @endforeach
            @else
                <tr class="text-center">
                    <td colspan="8">Nenhum armazém cadastrado</td>
                </tr>
            @endif
        </tbody>
    </table>
@endsection
