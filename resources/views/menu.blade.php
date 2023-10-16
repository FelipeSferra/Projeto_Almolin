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
            width: 28rem;
            height: 35rem;
            border-radius: 15px;
            margin: auto;
            margin-top: 4rem;
            background-color: #FFF1F1;
            display: flex;
            flex-direction: column;
            align-items: center;
        }

        .titleMenu {
            text-align: center;
            font-size: 35px;
            font-family: 'Roboto', sans-serif;
            font-weight: 700;
        }

        .buttonMenu {
            text-decoration: none;
            color: #fff;
            text-align: center;
            width: 80%;
            background-color: #FF7E39;
            height: 2.5rem;
            padding-top: 3px;
            border-radius: 10px;
            font-size: 28px;
            font-weight: 500;
            font-family: 'Roboto', sans-serif;
            margin-top: 10px;
        }
    </style>
</head>
<body class="backgroundMenu">
    <section>
        <div class="areaMenu">
            <h1 class="titleMenu">ALMOLIN</h1>
            <a href="{{url('produtos')}}" class="buttonMenu">Produtos</a>
            <a href="{{url('funcionarios')}}" class="buttonMenu" style="background-color: #004ADF">Funcionarios</a>
            <a href="{{url('categorias')}}" class="buttonMenu" style="background-color: #950700">Categorias</a>
            <a href="{{url('empresas')}}" class="buttonMenu" style="background-color: #626262">Empresas</a>
            <a href="{{url('armazens')}}" class="buttonMenu" style="background-color: #00457A">Armazens</a>
        </div>
    </section>
</body>
</html>
