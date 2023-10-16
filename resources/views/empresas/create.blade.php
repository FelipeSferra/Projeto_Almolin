@extends('components.body')

@section('title')
    Almolin - Cadastro Empresas
@endsection

@section('content')
    <h2>Empresas - Cadastro</h2>
    <hr>
    <form id="formCadEmpresas" name="formCadEmpresas" method="post" action="{{url('empresas')}}">
        @csrf
        <div class="row">
            <div class="col-md-6 mt-3">
                <label for="descr">Nome</label>
                <input type="text" id="descr" name="descr" class="form-control" minlength="1"
                       placeholder="Nome" required>
            </div>
            <div class="col-md-6 mt-3">
                <label for="cidade">Cidade</label>
                <input type="text" id="cidade" name="cidade" class="form-control" minlength="1"
                       placeholder="Cidade" required>
            </div>
        </div>
        <div class="row">
            <div class="text-end mt-4">
                <button type="submit" class="btn btn-outline-primary mx-2">Cadastrar</button>
                <a  class="btn btn-outline-secondary" href="{{url('empresas')}}" role="button">Voltar</a>
            </div>
        </div>
    </form>
@endsection
