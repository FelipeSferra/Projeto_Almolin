@extends('components.body')
@section('title')
    Almolin - Funcionarios
@endsection
@section('content')
    <h2>Funcionarios</h2>
    <hr>
    <div class="col-md-2 mb-2">
        <a class="btn btn-outline-primary" href="{{url('funcionarios/create')}}" role="button"><i
                class="fa-light fa-plus fa-sm"></i> Cadastrar</a>
    </div>
    @csrf
    <table class="table table-bordered table-sm">
        <thead class="text-center table-dark">
        <tr>
            <th scope="col">ID</th>
            <th scope="col">Usuário</th>
            <th scope="col">Nome</th>
            <th scope="col">Empresa</th>
            <th scope="col">Cargo</th>
            <th scope="col">Nível</th>
            <th class="col-3"></th>
        </tr>
        </thead>
        <tbody>
        @foreach($funcionarios as $funcionario)
            <form name="formEdtFunc" method="post" action="{{url("funcionarios/$funcionario->id")}}">
                @method("PUT")
                @csrf
                <tr>
                    <td>{{$funcionario->id}}</td>
                    <td>
                        <input type="text" id="usuario" name="usuario" class="form-control" value="{{$funcionario->username}}"
                               onclick="show_btn({{$funcionario->id}})">
                    </td>
                    <td>
                        <input type="text" id="nome" name="nome" class="form-control" value="{{$funcionario->nome}}"
                               onclick="show_btn({{$funcionario->id}})">
                    </td>
                    <td>
                        <select id="emp" name="emp" class="form-select"
                                onclick="show_btn({{$funcionario->id}})">
                            @foreach($empresas as $empresa)
                                <option
                                    value="{{$empresa->id}}" {{$empresa->id === $funcionario->id_emp ? "selected" : ""}}>{{$empresa->desc}}</option>
                            @endforeach
                        </select>
                    </td>
                    <td>
                        <input type="text" id="cargo" name="cargo" class="form-control" value="{{$funcionario->cargo}}"
                               onclick="show_btn({{$funcionario->id}})">
                    </td>
                    <td>
                        <input type="number" id="nivel" name="nivel" class="form-control"
                               value="{{$funcionario->level}}"
                               onclick="show_btn({{$funcionario->id}})">
                    </td>
                    <td>
                        <div class="text-end">
                            <button type="submit" class="btn btn-outline-success mx-2" id="{{$funcionario->id}}" onclick="EditConfirm();"
                                    disabled><i
                                    class="fa-light fa-pen-to-square fa-sm"></i> Editar
                            </button>
                            <button type="button" class="btn btn-outline-danger mx-1 delete" onclick="Delete('{{url("funcionarioDelete/$funcionario->id")}}');"><i class="fa-light fa-trash fa-sm"></i> Remover</button>
                        </div>
                    </td>
                </tr>
            </form>
        @endforeach
        </tbody>
    </table>
@endsection
