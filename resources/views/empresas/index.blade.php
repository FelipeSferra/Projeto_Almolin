@extends('components.body')
@section('title')
    Almolin - Empresas
@endsection
@section('content')
    <h2>Empresas</h2>
    <hr>
    <div class="col-md-2 mb-2">
        <a class="btn btn-outline-success" href="{{url('empresas/create')}}" role="button"><i
                class="fa-light fa-plus fa-sm"></i> Cadastrar</a>
    </div>
    @csrf
    <table class="table table-bordered table-sm">
        <thead class="text-center table-dark">
        <tr>
            <th scope="col">ID</th>
            <th scope="col">Nome</th>
            <th scope="col">Cidade</th>
            <th class="col-3"></th>
        </tr>
        </thead>
        <tbody>
        @foreach($empresas as $empresa)
            <tr>
                <td>{{$empresa->id}}</td>
                <td>{{$empresa->desc}}</td>
                <td>{{$empresa->cidade}}</td>
                <td>
                    <div class="text-end">
                        <a class="btn btn-outline-secondary mx-1" href="{{url("empresas/$empresa->id")}}" role="button"><i class="fa-light fa-eye fa-sm"></i> Visualizar</a>
                        <a class="btn btn-outline-primary mx-2" href="{{url("empresas/$empresa->id/edit")}}" role="button"><i class="fa-light fa-pen-to-square fa-sm"></i> Editar</a>
                    </div>
                </td>
            </tr>
        @endforeach
        </tbody>
    </table>
@endsection
