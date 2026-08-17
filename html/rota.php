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


        .conteiner {
            display: flex;
            flex-direction: column;
            align-items: center;
            margin-left: 150px;
            margin-top: 110px;
            gap: 20px;
            width: 1500px;
            
        }

        .ponto {
            width: 70%;
            border: 1px solid #ccc;
            padding: 15px;
            border-radius: 5px;
            background: #fff;
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


        #logout {
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
            margin-left: 30px;
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
            gap: 10px;
            ;

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
            border-color: blue;
        }

        .alunos {
            display: flex;
            align-items: center;
            gap: 8px;
            flex-wrap: wrap;
            margin-top: 20px;
        }

        .alunos p {
            margin: 0 5px 0 0;
            color: #272727;
            font-weight: bold;
        }

        .aluno {
            background-color: #d9d9d9;
            border: 1px solid #ddd;
            border-radius: 5px;
            padding: 6px 12px;
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

        <a><img src="/imagens/casa.png" alt="icon de uma casa"> Meu Perfil </a>
        <a><img src="/imagens/carteira.png" alt=" icon carteira"> Pagamento</a>
        <a> <img src="/imagens/rota_mapa.png" alt=" icon mapa"> Minhas Rotas</a>


    </div>

    <div class="conteiner">
        <?php
        require_once "conexao.php";
        require_once "funcoes.php";

        $resultados = ListarPontos($conexao);

        while ($ponto = mysqli_fetch_assoc($resultados)) {
            $ponto_id = $ponto['ponto_id'];
            $nome = $ponto['ponto_nome'];
            $descricao = $ponto['ponto_descricao'];
            $horario = $ponto['ponto_horario'];

            echo "<div class='ponto'>";
            echo "<h2>$nome</h2>";
            echo "<h2><hr></h2>";
            echo "<p>Descriçao: $descricao</p>";
            echo "<p>horario: $horario</p>";

            $alunos = BuscarAlunoPonto($conexao, $ponto_id);

            echo "<div class='alunos'>";

            echo "<p>Alunos:</p>";

            while ($aluno = mysqli_fetch_assoc($alunos)) {
                echo "<div class='aluno'>";
                echo $aluno['aluno_nome'];
                echo "</div>";
            }

            echo "</div>";
            echo "</div>";
        }
        ?>
    </div>


</body>

</html>