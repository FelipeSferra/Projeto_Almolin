@extends('components.body')
@section('title')
    Almolin - Produtos
@endsection
@section('content')
    <h2>Produtos</h2>
    <hr>
    <div class="col-md-2 mb-2">
        <a class="btn btn-outline-success" href="{{url('produtos/create')}}" role="button"><i
                class="fa-light fa-plus fa-sm"></i> Cadastrar</a>
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
        @foreach($produtos as $produto)
            @php
                $categoria = $produto->find($produto->id)->relCatProd;
                $armazem = $produto->find($produto->id)->relArmProd;
            @endphp
            <tr>
                <td>{{$produto->id}}</td>
                <td>{{$produto->desc}}</td>
                <td>{{$produto->custo}}</td>
                <td>{{$produto->qtd}}</td>
                <td>{{$categoria->desc}}</td>
                <td>{{$armazem->desc}}</td>
                <td>
                    <div class="text-end">
                        <a class="btn btn-outline-secondary mx-1" href="{{url("produtos/$produto->id")}}" role="button"><i class="fa-light fa-eye fa-sm"></i> Visualizar</a>
                        <a class="btn btn-outline-primary mx-2" href="{{url("produtos/$produto->id/edit")}}" role="button"><i class="fa-light fa-pen-to-square fa-sm"></i> Editar</a>
                    </div>
                </td>
            </tr>
        @endforeach
        </tbody>
    </table>
@endsection
