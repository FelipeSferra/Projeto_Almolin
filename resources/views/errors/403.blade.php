@extends('errors.layoutError')

@section('title')
    Erro 403
@endsection

@section('content')
    <div id="app" onclick="window.history.back()">
        <div>403</div>
        <div class="txt">
            Forbidden
        </div>
        <p>Clique em qualquer lugar para retornar<span class="blink">_</span></p>
    </div>
@endsection
