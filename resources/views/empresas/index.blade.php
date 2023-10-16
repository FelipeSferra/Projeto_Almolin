@extends('components.body')
@section('title')
    Almolin - Empresas
@endsection
@section('content')
    <h2>Empresas</h2>
    <hr>
    <div class="col-md-2 mb-2">
        <a class="btn btn-outline-primary" href="{{url('empresas/create')}}" role="button"><i
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
            <form name="formEdtCat" method="post" action="{{url("empresas/$empresa->id")}}">
                @method("PUT")
                @csrf
                <tr>
                    <td>{{$empresa->id}}</td>
                    <td>
                        <input type="text" id="descr" name="descr" class="form-control" value="{{$empresa->desc}}"
                               onclick="show_btn({{$empresa->id}})">
                    </td>
                    <td>
                        <input type="text" id="cidade" name="cidade" class="form-control" value="{{$empresa->cidade}}"
                               onclick="show_btn({{$empresa->id}})">
                    </td>
                    <td>
                        <div class="text-end">
                            <button type="submit" class="btn btn-outline-success mx-2" id="{{$empresa->id}}" onclick="EditConfirm();"
                                    disabled><i
                                    class="fa-light fa-pen-to-square fa-sm"></i> Editar
                            </button>
                            <button type="button" class="btn btn-outline-danger mx-1 delete" onclick="Delete('{{url("empresaDelete/$empresa->id")}}');"><i class="fa-light fa-trash fa-sm"></i> Remover</button>
                        </div>
                    </td>
                </tr>
            </form>
        @endforeach
        </tbody>
    </table>
@endsection
