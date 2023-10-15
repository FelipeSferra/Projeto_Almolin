@extends('components.body')
@section('title')
    Almolin - Produtos
@endsection
<style>

</style>
@section('content')
    <h2>Produtos</h2>
    <hr>
    <div class="col-md-2 mb-2">
        <a class="btn btn-outline-primary" href="{{url('produtos/create')}}" role="button"><i
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

            <form name="formEdtProd" method="post" action="{{url("produtos/$produto->id")}}">
                @method("PUT")
                @csrf
                <tr>

                    <td>{{$produto->id}}</td>
                    <td><input id="desc" name="desc" class="form-control" value="{{$produto->desc}}"
                               onclick="show_btn({{$produto->id}})"></td>
                    <td><input id="custo" name="custo" class="form-control" value="{{$produto->custo}}" onclick="show_btn({{$produto->id}})"></td>
                    <td><input id="qtd" name="qtd" class="form-control" value="{{$produto->qtd}}" onclick="show_btn({{$produto->id}})"></td>
                    <td>
                        <select id="categoria" name="categoria" class="form-select" onclick="show_btn({{$produto->id}})">
                            @foreach($categorias as $categoria)
                                <option
                                    value="{{$categoria->id}}" {{$categoria->id === $produto->id_cat ? "selected" : ""}}>{{$categoria->desc}}</option>
                            @endforeach
                        </select>
                    </td>
                    <td>
                        <select id="armazem" name="armazem" class="form-select" onclick="show_btn({{$produto->id}})">
                            @foreach($armazens as $armazem)
                                <option
                                    value="{{$armazem->id}}" {{$armazem->id === $produto->id_arm ? "selected" : ""}}>{{$armazem->desc}}</option>
                            @endforeach
                        </select>
                    </td>
                    <td>
                        <div class="text-end">
                            <button type="submit" class="btn btn-outline-success mx-2" id="{{$produto->id}}" disabled><i
                                    class="fa-light fa-pen-to-square fa-sm"></i> Editar
                            </button>
                            <a class="btn btn-outline-danger mx-1" href="{{url("produtos/$produto->id")}}"
                               role="button"><i class="fa-light fa-trash fa-sm"></i> Remover</a>
                        </div>
                    </td>
                </tr>
            </form>
        @endforeach
        </tbody>
    </table>
@endsection
<script>
    function show_btn(id) {
        let Ant = document.querySelectorAll('.enable');
        Ant.forEach(function (btnAnt){
            btnAnt.classList.remove('enable');
            btnAnt.setAttribute('disabled', '');
        })

        let btn = document.getElementById(id);
        btn.classList.add('enable');
        btn.removeAttribute('disabled');
    }

</script>
