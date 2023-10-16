@extends('components.body')

@section('title')
    Almolin - Transações
@endsection

@section('content')
    <h2>Transação</h2>
    <hr>
    <form id="formTran" name="formTran" method="post" action="{{url('transacao')}}">
        @csrf
        <div class="row">
            <div class="col-md-4 mt-3">
                <label for="idFunc">Funcionário</label>
                <select id="id_func" name="id_func" class="form-control" required>
                    <option selected>Selecione...</option>
                    @foreach($funcionarios as $funcionario)
                        <option value="{{$funcionario->id}}">{{$funcionario->nome}}</option>
                        <input type="hidden" id="id_emp" name="id_emp" value="{{$funcionario->id_emp}}"> 
                    @endforeach
                </select>
            </div>
            <div class="col-md-4 mt-3">
                <label for="idFunc">Produto</label>
                <select id="id_itm" name="id_itm" class="form-control" required>
                    <option selected>Selecione...</option>
                    @foreach($produtos as $produto)
                        <option value="{{$produto->id}}">{{$produto->desc}}</option>
                        <!-- <input type="hidden" id="id_emp" value="{{$funcionario->id_emp}}">  -->
                    @endforeach
                </select>
            </div>
            <div class="col-md-1 mt-3">
                <label for="qtd">Quantidade</label>
                <input type="number" id="qtd" name="qtd" class="form-control" placeholder="QTD"
                       required>
            </div>
            <div class="col-md-3 mt-3">
                <label for="categoria">Armazem</label>
                <select id="id_arm" name="id_arm" class="form-control" required>
                    <option selected>Selecione...</option>
                    @foreach($armazem as $armazens)
                        <option value="{{$armazens->id}}">{{$armazens->desc}}</option>
                    @endforeach
                </select>
            </div>
        </div>
        <div class="row">
            <div class="text-end mt-4">
                <button type="submit" class="btn btn-outline-primary mx-2">Cadastrar</button>
                <a  class="btn btn-outline-secondary" href="{{url('transacao')}}" role="button">Voltar</a>
            </div>
        </div>
    </form>
@endsection