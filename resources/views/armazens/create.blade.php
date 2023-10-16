@extends('components.body')

@section('title')
    Almolin - Cadastro Armazens
@endsection

@section('content')
    <h2>Armazens - Cadastro</h2>
    <hr>
    <form id="formCadArm" name="formCadArm" method="post" action="{{url('armazens')}}">
        @csrf
        <div class="row">
            <div class="col-md-4 mt-3">
                <label for="desc">Descrição</label>
                <input type="text" id="desc" name="desc" class="form-control" minlength="1"
                       placeholder="Descrição" required>
            </div>
            <div class="col-md-3 mt-3">
                <label for="emp">Empresa</label>
                <select id="emp" name="emp" class="form-control" required>
                    <option selected>Selecione...</option>
                    @foreach($empresas as $empresa)
                        <option value="{{$empresa->id}}">{{$empresa->desc}}</option>
                    @endforeach
                </select>
            </div>
            <div class="col-md-2 mt-3">
                <label for="cidade">Cidade</label>
                <input type="text" id="cidade" name="cidade" class="form-control" placeholder="Cidade"
                       required>
            </div>
            <div class="col-md-2 mt-3">
                <label for="endereco">Endereço</label>
                <input type="text" id="endereco" name="endereco" class="form-control" placeholder="Endereço"
                       required>
            </div>
            <div class="col-md-2 mt-3">
                <label for="bairro">Bairro</label>
                <input type="text" id="bairro" name="bairro" class="form-control" placeholder="Bairro"
                       required>
            </div>
            <div class="col-md-2 mt-3">
                <label for="num">Numero</label>
                <input type="text" id="num" name="num" class="form-control" placeholder="Numero"
                       required>
            </div>
        </div>
        <div class="row">
            <div class="text-end mt-4">
                <button type="submit" class="btn btn-outline-primary mx-2">Cadastrar</button>
                <a  class="btn btn-outline-secondary" href="{{url('armazens')}}" role="button">Voltar</a>
            </div>
        </div>
    </form>
@endsection
