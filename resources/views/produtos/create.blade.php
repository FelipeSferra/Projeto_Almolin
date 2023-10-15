@extends('components.body')

@section('title')
    Almolin - Cadastro Produtos
@endsection

@section('content')
    <h2>Produtos - Cadastro</h2>
    <hr>
    <form id="formCadProd" name="formCadProd" method="post" action="{{url('produtos')}}">
        @csrf
        <div class="row">
            <div class="col-md-4 mt-3">
                <label for="desc">Descrição</label>
                <input type="text" id="desc" name="desc" class="form-control" minlength="4"
                       placeholder="Descrição" required>
            </div>
            <div class="col-md-1 mt-3">
                <label for="custo">Custo</label>
                <input type="number" id="custo" name="custo" class="form-control" step="0.01" placeholder="Custo"
                       required>
            </div>
            <div class="col-md-1 mt-3">
                <label for="qtd">Quantidade</label>
                <input type="number" id="qtd" name="qtd" class="form-control" placeholder="QTD"
                       required>
            </div>
            <div class="col-md-3 mt-3">
                <label for="categoria">Categoria</label>
                <select id="categoria" name="categoria" class="form-control" required>
                    <option selected>Selecione...</option>
                    @foreach($categorias as $categoria)
                        <option value="{{$categoria->id}}">{{$categoria->desc}}</option>
                    @endforeach
                </select>
            </div>
            <div class="col-md-3 mt-3">
                <label for="armazem">Armazém</label>
                <select id="armazem" name="armazem" class="form-control" required>
                    <option selected>Selecione...</option>
                    @foreach($armazens as $armazem)
                        <option value="{{$armazem->id}}">{{$armazem->desc}}</option>
                    @endforeach
                </select>
            </div>
        </div>
        <div class="row">
            <div class="text-end mt-4">
                <button type="submit" class="btn btn-outline-primary mx-2">Cadastrar</button>
                <a  class="btn btn-outline-secondary" href="{{url('produtos')}}" role="button">Voltar</a>
            </div>
        </div>
    </form>
@endsection
