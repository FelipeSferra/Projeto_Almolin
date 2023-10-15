@extends('components.body')
@section('title')
    Almolin - Funcionarios
@endsection
@section('content')
    <h2>Funcionarios</h2>
    <hr>
    <div class="col-md-2 mb-2">
        <a class="btn btn-outline-success" href="{{url('funcionarios/create')}}" role="button"><i
                class="fa-light fa-plus fa-sm"></i> Cadastrar</a>
    </div>
    @csrf
    <table class="table table-bordered table-sm">
        <thead class="text-center table-dark">
        <tr>
            <th scope="col">ID</th>
            <th scope="col">Nome</th>
            <th scope="col">Empresa</th>
            <th scope="col">cargo</th>
            <th scope="col">nivel</th>
            <th class="col-3"></th>
        </tr>
        </thead>
        <tbody>
        @foreach($funcionarios as $funcionario)
            @php
                $empresa = $funcionario->find($funcionario->id)->relEmpFunc;
            @endphp
            <tr>
                <td>{{$funcionario->id}}</td>
                <td>{{$funcionario->nome}}</td>
                <td>{{$empresa->desc}}</td>
                <td>{{$funcionario->cargo}}</td>
                <td>{{$funcionario->nivel}}</td>
                <td>
                    <div class="text-end">
                        <a class="btn btn-outline-secondary mx-1" href="{{url("funcionarios/$funcionario->id")}}" role="button"><i class="fa-light fa-eye fa-sm"></i> Visualizar</a>
                        <a class="btn btn-outline-primary mx-2" href="{{url("funcionarios/$funcionario->id/edit")}}" role="button"><i class="fa-light fa-pen-to-square fa-sm"></i> Editar</a>
                    </div>
                </td>
            </tr>
        @endforeach
        </tbody>
    </table>
@endsection
