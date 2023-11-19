<!doctype html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="https://site-assets.fontawesome.com/releases/v6.4.0/css/all.css">

    <link rel="stylesheet" href="https://site-assets.fontawesome.com/releases/v6.4.0/css/sharp-solid.css">

    <link rel="stylesheet" href="https://site-assets.fontawesome.com/releases/v6.4.0/css/sharp-regular.css">

    <link rel="stylesheet" href="https://site-assets.fontawesome.com/releases/v6.4.0/css/sharp-light.css">
    <link rel="stylesheet" href="{{url('assets/bootstrap/css/bootstrap.css')}}">
    <link rel="stylesheet" href="{{url('assets/css/style.css')}}">
    <title>@yield('title')</title>
</head>
<body>

<nav class="navbar navbar-expand-lg bg-dark" data-bs-theme="dark">
    <div class="container-fluid">
        <a class="navbar-brand" href="/">ALMOLIN</a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarColor02"
                aria-controls="navbarColor02" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarColor02">
            <ul class="navbar-nav me-auto">
                <li class="nav-item">
                    <a class="nav-link active" href="{{url("/")}}">Menu
                        <span class="visually-hidden">(current)</span>
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="{{url("transacao")}}">Transações</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="{{url("produtos")}}">Produtos</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="{{url("funcionarios")}}">Funcionarios</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="{{url("categorias")}}">Categorias</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="{{url("armazens")}}">Local de estoque</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="{{url("empresas")}}">Empresas</a>
                </li>
                @if(Auth::user()->level === 3)
                    <li class="nav-item">
                        <a class="nav-link" href="#">Usuários</a>
                    </li>
                @endif
            </ul>
            <ul class="navbar-nav ms-auto mb-2 mb-lg-0">
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown"
                       aria-expanded="false">
                        {{Auth::user()->username}}
                    </a>
                    <ul class="dropdown-menu">
                        <li>
                            <form method="POST" action="{{route('logout')}}">
                                @csrf
                                <a class="dropdown-item" href="{{ route('logout') }}" onclick="event.preventDefault();
                                                this.closest('form').submit();">Sair</a>
                            </form>
                        </li>
                    </ul>
                </li>
            </ul>
            <!-- <form class="d-flex">
              <input class="form-control me-sm-2" type="search" placeholder="Search">
              <button class="btn btn-secondary my-2 my-sm-0" type="submit">Search</button>
            </form> -->
        </div>

    </div>
</nav>
<div class="max-width">
    @yield('content')
</div>
<script src="{{url("assets/js/script.js")}}"></script>
<script src="{{url("assets/swal/dist/sweetalert2.all.js")}}"></script>
<script src="{{url("assets/bootstrap/js/bootstrap.bundle.js")}}"></script>

</body>
</html>
