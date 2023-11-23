@extends('errors.layoutError')

@section('title')
    Erro 403
@endsection

@section('content')
    <div class="row position-absolute top-50 start-50 translate-middle">
        <div class="col-md-6 text-center">
            <img src="{{ url('assets/img/sem_permissao.png') }}" class="img-fluid" style="width:90%"/>
        </div>
        <div class="col-md-6 textP">
            <h1>Sem permissão</h1>
            <p >Você não tem acesso a essa página.</p>
            <button class="btn btn-info mt-5" onclick="window.location='{{route('menu')}}'" style="color: #fff;"><i class="fa-light fa-rotate-left"></i> Página Inicial</button>
        </div>
    </div>
@endsection
