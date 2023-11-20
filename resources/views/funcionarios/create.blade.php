@extends('components.body')

@section('title')
    Almolin - Cadastro Funcionarios
@endsection

@section('content')
    <h2>Funcionarios - Cadastro</h2>
    <hr>
    <form id="formCadFuncionarios" name="formCadFuncionarios" method="POST" action="{{url('funcionarios')}}">
        @csrf
        <div class="row">
            <div class="col-md-4 mt-3">
                <label for="username">Usuário</label>
                <input type="text" id="username" name="username" class="form-control" placeholder="Usuário" required>
            </div>
            <div class="col-md-4 mt-3">
                <label for="nome">Nome</label>
                <input type="text" id="nome" name="nome" class="form-control" minlength="1"
                       placeholder="Nome" required>
            </div>
            <div class="col-md-2 mt-3">
                <label for="id_emp">Empresa</label>
                <select id="id_emp" name="id_emp" class="form-control" required>
                    <option selected>Selecione...</option>
                    @foreach($empresas as $empresa)
                        <option value="{{$empresa->id}}">{{$empresa->desc}}</option>
                    @endforeach
                </select>
            </div>
            <div class="col-md-2 mt-3">
                <label for="level">Nivel</label>
                <select id="level" name="level" class="form-control" required>
                    <option selected>Selecione...</option>
                    <option value="1">1</option>
                    <option value="2">2</option>
                    <option value="3">3</option>
                </select>
            </div>
        </div>
        <div class="row">
            <div class="col-md-4 mt-3">
                <label for="cargo">Cargo</label>
                <input type="text" id="cargo" name="cargo" class="form-control" placeholder="Cargo"
                       required>
            </div>
            <div class="col-md-4 mt-3">
                <label for="password">Senha</label>
                <input type="password" id="password" name="password" class="form-control" placeholder="Senha" required >
                <x-input-error :messages="$errors->get('password')" class="mt-2" />
            </div>
            <div class="col-md-4 mt-3">
                <label for="email">Email</label>
                <input type="email" id="email" name="email" class="form-control" placeholder="Email" required >
                <x-input-error :messages="$errors->get('email')" class="mt-2" />
            </div>
        </div>
        <div class="row">
            <div class="text-end mt-4">
                <button type="submit" class="btn btn-outline-primary mx-2">Cadastrar</button>
                <a class="btn btn-outline-secondary" href="{{url('funcionarios')}}" role="button">Voltar</a>
            </div>
        </div>
    </form>
@endsection
