<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Menu</title>

    <link rel="preconnect" href="https://fonts.googleapis.com">

    <link href="https://fonts.googleapis.com/css2?family=Italianno&family=Roboto&display=swap" rel="stylesheet">

    <style>
        .backgroundMenu {
            background: #180164;
            width: 100%;
            height: 100%;
            padding: 0;
            margin: 0;
        }

        .areaMenu {
            width: 93%;
            height: 23.7rem;
            border-radius: 15px;
            margin: auto;
            margin-top: 4rem;
            background-color: #FFF1F1;
            display: flex;
            flex-direction: column;
            align-items: center;
        }

        .titleMenu {
            text-align: left;
            font-size: 35px;
            font-family: 'Roboto', sans-serif;
            font-weight: 700;
            align-self: flex-start;
            margin-left: 4.3rem;
            color: #706767;
            margin-top: 3rem;
        }

        .textMenu {
            text-decoration: none;
            color: #fff;
            text-align: center;
            width: 8rem;
            height: 2rem;
            font-size: 21px;
            font-weight: 500;
            font-family: 'Roboto', sans-serif;
            margin-top: 10px;
        }

        .buttonMenu {
            width: 150px;
            margin-right: 1rem;
            align-items: center;
            flex-direction: column;
            display: flex;
            height: 180px;
            border-radius: 7px;
            background-color: #30adff;
            border-color: #c5c5c5;
            border-style: solid;
            border-width: 3px;
            justify-content: space-evenly;
            cursor: pointer;
        }
    </style>
</head>
<body class="backgroundMenu">
<section>
    <div class="areaMenu">
        <h1 class="titleMenu">ALMOLIN</h1>
        <div style="flex-direction: row; width: 90%; height: 90%; display: flex; margin-top: 1rem">
            <button class="buttonMenu" onclick="navigationTrans()">
                <img src="{{url('assets/img/transferir.png')}}" width="70" height="70">
                <a href="{{url('transacao')}}" class="textMenu">Emprestar</a>
            </button>
            <button class="buttonMenu" onclick="navigationProd()">
                <img src="{{url('assets/img/produtos.png')}}" width="70" height="70">
                <a href="{{url('produtos')}}" class="textMenu">Produtos</a>
            </button>
            @if(Auth::user()->level === 3)
                <button class="buttonMenu" onclick="navigationFunc()">
                    <img src="{{url('assets/img/funcionarios.png')}}" width="70" height="70">
                    <a href="{{url('funcionarios')}}" class="textMenu">Funcionários</a>
                </button>
            @endif
            <button class="buttonMenu" onclick="navigationCat()">
                <img src="{{url('assets/img/categorias.png')}}" width="70" height="70">
                <a href="{{url('categorias')}}" class="textMenu">Categorias</a>
            </button>
            @if(Auth::user()->level === 3)
                <button class="buttonMenu" onclick="navigationEmp()">
                    <img src="{{url('assets/img/predio.png')}}" width="70" height="70">
                    <a href="{{url('empresas')}}" class="textMenu">Empresas</a>
                </button>
            @endif
            @if(Auth::user()->level === 2 || Auth::user()->level === 3)
                <button class="buttonMenu" onclick="navigationArm()">
                    <img src="{{url('assets/img/armazem.png')}}" width="70" height="70">
                    <a href="{{url('armazens')}}" class="textMenu">Armazens</a>
                </button>
            @endif
        </div>
    </div>
</section>
</body>
</html>

<script>
    function navigationTrans() {
        window.location.href = "{{url('transacao')}}";
    }

    function navigationProd() {
        window.location.href = "{{url('produtos')}}";
    }

    function navigationFunc() {
        window.location.href = "{{url('funcionarios')}}";
    }

    function navigationCat() {
        window.location.href = "{{url('categorias')}}";
    }

    function navigationEmp() {
        window.location.href = "{{url('empresas')}}";
    }

    function navigationArm() {
        window.location.href = "{{url('armazens')}}";
    }
</script>
