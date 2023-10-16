@extends('components.body')
@section('title')
    Almolin - Transações
@endsection
<style>

</style>
@section('content')
    <h2>Transações</h2>
    <hr>
    <div class="col-md-2 mb-2">
        <a class="btn btn-outline-primary" href="{{url('transacao/create')}}" role="button"><i
                class="fa-light fa-plus fa-sm"></i> Emprestar</a>
    </div>
    @csrf
    <table class="table table-bordered table-sm">
        <thead class="text-center table-dark">
        <tr>
            <th scope="col">ID</th>
            <th scope="col">Funcionário</th>
            <th scope="col">Produto</th>
            <th scope="col">QTD</th>
            <th scope="col">Armazém</th>
            <th class="col-2"></th>
        </tr>
        </thead>
        <tbody>
        @foreach($transacoes as $transacao)

            <form name="formEdtTran" method="post" action="{{url("transacao/$transacao->id")}}">
                @method("PUT")
                @csrf
                <tr>

                    <td>{{$transacao->id}}</td>
                    <td>
                        <select id="id_func" name="id_func" class="form-select" onclick="show_btn({{$transacao->id}})">
                            @foreach($funcionarios as $funcionario)
                                <option
                                    value="{{$funcionario->id}}" {{$funcionario->id === $transacao->id_func ? "selected" : ""}}>{{$funcionario->nome}}
                                    <input type="hidden" id="id_emp" value="{{$funcionario->id_emp}}">
                                </option>
                            @endforeach
                        </select>
                    </td>
                    <td>
                        <select id="id_itm" name="id_itm" class="form-select" onclick="show_btn({{$transacao->id}})">
                            @foreach($produtos as $produto)
                                <option
                                    value="{{$produto->id}}" {{$produto->id === $transacao->id_itm ? "selected" : ""}}>{{$produto->desc}}</option>
                            @endforeach
                        </select>
                    </td>
                    <td><input id="qtd" name="qtd" class="form-control" value="{{$transacao->qtd}}" onclick="show_btn({{$transacao->id}})"></td>
                    <td>
                        <select id="id_arm" name="id_arm" class="form-select" onclick="show_btn({{$transacao->id}})">
                            @foreach($armazens as $armazem)
                                <option
                                    value="{{$armazem->id}}" {{$armazem->id === $transacao->id_arm ? "selected" : ""}}>{{$armazem->desc}}</option>
                            @endforeach
                        </select>
                    </td>
                    <td>
                        <div class="text-end">
                            <button type="button" class="btn btn-outline-danger mx-1 delete"
                                    onclick="Delete('{{url("transacaoDelete/$transacao->id")}}');"><i
                                    class="fa-light fa-trash fa-sm"></i> Remover
                            </button>
                        </div>
                    </td>
                </tr>
            </form>
        @endforeach
        </tbody>
    </table>
@endsection
