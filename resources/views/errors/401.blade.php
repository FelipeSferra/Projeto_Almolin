@extends('errors.layoutError')

@section('title')
    Erro 401
@endsection

@section('content')
    <div id="app" onclick="window.history.back()">
        <div>401</div>
        <div class="txt">
            Unauthorized
        </div>
        <p>Clique em qualquer lugar para retornar<span class="blink">_</span></p>
    </div>
@endsection
