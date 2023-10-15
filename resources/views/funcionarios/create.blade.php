@extends('components.body')

@section('title')
    Almolin - Cadastro Funcionarios
@endsection

@section('content')
    <h2>Funcionarios - Cadastro</h2>
    <hr>
    <form id="formCadFuncionarios" name="formCadFuncionarios" method="post" action="{{url('funcionarios')}}">
        @csrf
        <div class="row">
            <div class="col-md-4 mt-3">
                <label for="desc">Nome</label>
                <input type="text" id="nome" name="nome" class="form-control" minlength="1"
                       placeholder="Nome" required>
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
                <label for="cargo">Cargo</label>
                <input type="text" id="cargo" name="cargo" class="form-control" placeholder="Cargo"
                       required>
            </div>
            <div class="col-md-1 mt-3">
                <label for="nivel">Nivel</label>
                <input type="number" id="nivel" name="nivel" class="form-control" placeholder="Nivel"
                        required>
            </div>
        </div>
        <div class="row">
            <div class="text-end mt-4">
                <button type="submit" class="btn btn-outline-primary mx-2">Cadastrar</button>
                <a  class="btn btn-outline-secondary" href="{{url('funcionarios')}}" role="button">Voltar</a>
            </div>
        </div>
    </form>
@endsection
