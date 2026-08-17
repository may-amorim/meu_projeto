<?php

session_start();

require_once "funcoes.php";

VerificarLogin();

?>


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>CarlosBuz</title>
    <link rel="icon" type="image/png" href="logo.png">
    <style>
        #cabecalho {
            display: flex;
            align-items: center;
            gap: 15px;
            position: fixed;
            top: 0;
            left: 0;
            width: 100%;
            padding: 10px;
            z-index: 1000;
            border-bottom: 1px solid gray;
            background-color: white;
        }

        #logo {
            border-radius: 100%;
            width: 69px;
            height: 69px;
            display: flex;

        }

        #textos {
            display: flex;
            flex-direction: column;
        }

        #t_escolar {
            font-size: 20px;
            font-weight: bold;
            margin: 0;
        }

        #p_aluno {
            margin: 0;
            color: gray;
        }

        #logout{
            margin-left: auto;
            margin-right: 40px;
        }

        #sair {

            width: 22px;
            height: 22px;

        }

        .menu_aluno {
            background: #d9d9d9;
            padding: 10px;
            border-radius: 5px;
            display: flex;
            flex-direction: column;
            gap: 8px;
            width: 200px;
            margin-top: 100px;
            position: fixed;


        }

        .menu_aluno a {
            padding: 10px;
            background: white;
            border: none;
            text-align: left;
            text-decoration: none;
            display: flex;
            align-items: center;
            gap: 10px;;

        }

        .menu_aluno img {
            width: 22px;
            height: 22px;
        }

        .menu_aluno a:hover {
            background-color: darkgrey;
            text-decoration: none;

        }

        .conteudo {
            padding: 20px;
            margin-top: 100px;
            background-color: white;
        }

        .perfil_aluno {
            background: #d9d9d9;
            padding: 60px;
            border-radius: 5px;
            width: 600px;
            height: 500px;
            margin-left: 350px;
            margin-top: 50px;

            display: grid;
            grid-template-columns: 70px 3fr;
            flex-direction: column;
            gap: 30px;
        }

        .perfil_aluno img {
            width: 30px;
            height: 30px;
        }

        .perfil_aluno hr {
            grid-column: 2 / 3;
            width: 100%;
        }

        .perfil_aluno button {
            background: #000080;
            width: 470px;
            height: 40px;
            color: white
        }
    </style>
</head>

<body>


    <div id="cabecalho">

        <img id="logo" src="logo.png" alt="logo da empresa">

        <div id="textos">

            <p id="t_escolar">Transporte Escolar</p>
            <p id="p_aluno">Painel do aluno</p>
            
        </div>

        <div id="logout">

            <a href="logout.php"><img src="imagens/sair.png" alt="sair" id="sair"></a>
            <a href="logout.php">sair</a>

        </div>

    </div>

    <hr>

    <div class="menu_aluno">

        <a href="home_aluno.php"><img src="/imagens/casa.png" alt="icon de uma casa"> Meu Perfil </a>
        <a href="pagamento_aluno.php"><img src="/imagens/carteira.png" alt=" icon carteira"> Pagamento</a>
        <a href="rota.php"><img src="/imagens/rota_mapa.png" alt=" icon mapa"> Minhas Rotas</a>
       

    </div>

    <div class="conteudo">

        <div class="perfil_aluno">
            <img src="/imagens/perfil.png" alt="icon de infos">
            <p>Informações Pessoais</p>
            <hr>
            <img src="/imagens/grupo.png" alt="icon de pais">
            <p>Responsáveis</p>
            <hr>
            <img src="/imagens/diplomado.png" alt="icon de info academica">
            <p>Informções Academicas</p>
            <hr>
            <img src="/imagens/rota_mapa.png" alt="icon de info de rota">
            <p>Informções de Rota</p>
            <hr>
            <button> Editar Cadastro do Aluno</button>

        </div>
    </div>
</body>

</html>