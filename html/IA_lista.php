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
    <title>Document</title>
    <link rel="icon" type="image/png" href="logo.png">

    <style>

        /* ================================
           CONFIGURAÇÃO GERAL
        ================================= */

        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
        }

        body {
            background-color: #f5f7fa;
            color: #222;
        }


        /* ================================
           CABEÇALHO
        ================================= */

        #cabecalho {
            display: flex;
            align-items: center;
            gap: 15px;

            position: fixed;
            top: 0;
            left: 0;

            width: 100%;
            height: 85px;

            padding: 10px 25px;

            z-index: 1000;

            background-color: white;

            border-bottom: 1px solid #e5e5e5;

            box-shadow: 0 2px 10px rgba(0, 0, 0, 0.08);
        }


        #logo {
            width: 65px;
            height: 65px;

            border-radius: 50%;

            object-fit: cover;
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


        #p_motorista {
            margin: 3px 0 0 0;

            color: #777;

            font-size: 14px;
        }


        /* ================================
           BOTÃO SAIR
        ================================= */

        #logout {
            margin-left: auto;
            margin-right: 15px;

            display: flex;
            align-items: center;

            gap: 8px;
        }


        #logout a {
            color: #333;

            text-decoration: none;

            font-size: 14px;

            font-weight: 600;

            transition: 0.2s;
        }


        #logout a:hover {
            color: #d62828;
        }


        #sair {
            width: 22px;
            height: 22px;
        }


        /* ================================
           MENU LATERAL
        ================================= */

        .menu_motorista {
            position: fixed;

            top: 105px;
            left: 25px;

            width: 190px;

            padding: 12px;

            background-color: #e4e6e8;

            border-radius: 12px;

            display: flex;
            flex-direction: column;

            gap: 8px;

            box-shadow: 0 4px 12px rgba(0, 0, 0, 0.10);
        }


        .menu_motorista a {
            padding: 11px 12px;

            background-color: white;

            border-radius: 8px;

            border: 1px solid #eeeeee;

            text-align: left;

            text-decoration: none;

            color: #333;

            display: flex;
            align-items: center;

            gap: 10px;

            font-size: 14px;

            transition: 0.2s;
        }


        .menu_motorista a:hover {
            background-color: #f0f2f4;

            transform: translateX(3px);

            text-decoration: none;
        }


        .menu_motorista img {
            width: 22px;
            height: 22px;

            object-fit: contain;
        }


        /* ================================
           ÁREA DE PESQUISA
        ================================= */

        .lista_pesquisa {
            margin-left: 240px;

            padding: 110px 30px 20px 30px;

            display: flex;

            justify-content: space-between;

            align-items: center;

            gap: 20px;
        }


        #lista {
            font-size: 22px;

            font-weight: bold;

            color: #222;

            margin: 0;
        }


        #lupa {
            width: 22px;
            height: 22px;

            object-fit: contain;
        }


        #form {
            display: flex;

            align-items: center;

            gap: 10px;
        }


        #pesquisa {
            width: 250px;
            height: 38px;

            padding: 0 12px;

            border: 1px solid #d5d9de;

            border-radius: 8px;

            background-color: white;

            outline: none;

            font-size: 14px;

            transition: 0.2s;
        }


        #pesquisa:focus {
            border-color: #2563eb;

            box-shadow: 0 0 0 3px rgba(37, 99, 235, 0.10);
        }


        #botao_pesquisar {
            width: 110px;
            height: 38px;

            background-color: #2563eb;

            color: white;

            border: none;

            border-radius: 8px;

            cursor: pointer;

            font-size: 14px;

            font-weight: 600;

            transition: 0.2s;
        }


        #botao_pesquisar:hover {
            background-color: #1d4ed8;

            transform: translateY(-1px);
        }


        /* ================================
           LISTA DE ALUNOS
        ================================= */

        .conteiner {
            margin-left: 240px;

            padding: 10px 30px 30px 30px;

            display: flex;

            flex-wrap: wrap;

            gap: 20px;

            min-height: calc(100vh - 180px);
        }


        /* ================================
           CARD DO ALUNO
        ================================= */

        .aluno {
            width: 220px;

            min-height: 270px;

            padding: 20px;

            background-color: white;

            border: 1px solid #e5e7eb;

            border-radius: 12px;

            display: flex;

            flex-direction: column;

            align-items: center;

            text-align: center;

            box-shadow: 0 4px 12px rgba(0, 0, 0, 0.08);

            transition: 0.2s;
        }


        .aluno:hover {
            transform: translateY(-3px);

            box-shadow: 0 7px 16px rgba(0, 0, 0, 0.12);
        }


        .aluno img {
            width: 100px;

            height: 100px;

            border-radius: 50%;

            object-fit: cover;

            border: 3px solid #f0f2f4;

            margin-bottom: 15px;
        }


        .aluno h2 {
            width: 100%;

            margin: 0 0 8px 0;

            font-size: 18px;

            color: #222;

            word-break: break-word;
        }


        .aluno p {
            margin: 0 0 18px 0;

            color: #666;

            font-size: 14px;
        }


        /* ================================
           BOTÃO DETALHAR
        ================================= */

        #detalhar {
            display: inline-block;

            margin-top: auto;

            padding: 8px 18px;

            background-color: #e7f0ff;

            color: #2563eb;

            border-radius: 7px;

            text-decoration: none;

            font-size: 13px;

            font-weight: 600;

            transition: 0.2s;
        }


        #detalhar:hover {
            background-color: #d8e7ff;

            transform: translateY(-1px);
        }


        /* ================================
           RESPONSIVIDADE
        ================================= */

        @media (max-width: 1000px) {

            .lista_pesquisa {
                margin-left: 225px;

                padding-left: 25px;
                padding-right: 25px;
            }


            .conteiner {
                margin-left: 225px;

                padding-left: 25px;
                padding-right: 25px;
            }


            .aluno {
                width: 200px;
            }
        }


        @media (max-width: 800px) {

            .menu_motorista {
                position: relative;

                top: auto;
                left: auto;

                width: calc(100% - 30px);

                margin: 100px 15px 0;

                flex-direction: row;

                flex-wrap: wrap;
            }


            .menu_motorista a {
                flex: 1;

                min-width: 140px;
            }


            .lista_pesquisa {
                margin-left: 0;

                padding: 25px 15px;

                flex-wrap: wrap;
            }


            .conteiner {
                margin-left: 0;

                padding: 10px 15px 30px;
            }
        }


        @media (max-width: 600px) {

            #cabecalho {
                padding: 10px 15px;
            }


            #logo {
                width: 55px;
                height: 55px;
            }


            #t_escolar {
                font-size: 17px;
            }


            #p_motorista {
                font-size: 12px;
            }


            #logout {
                margin-right: 0;
            }


            .lista_pesquisa {
                flex-direction: column;

                align-items: stretch;

                gap: 15px;
            }


            #lista {
                font-size: 20px;
            }


            #form {
                width: 100%;
            }


            #pesquisa {
                flex: 1;

                width: auto;
            }


            .conteiner {
                justify-content: center;
            }


            .aluno {
                width: 100%;

                max-width: 320px;
            }
        }

    </style>
</head>

<body>

    <div id="cabecalho">

        <img id="logo" src="logo.png" alt="logo da empresa">

        <div id="textos">
            <p id="t_escolar">Transporte Escolar</p>
            <p id="p_motorista">Painel do motorista</p>
        </div>

        <div id="logout">

            <a href="logout.php"><img src="imagens/sair.png" alt="sair" id="sair"></a>
            <a href="logout.php">sair</a>

        </div>

    </div>

    <div class="menu_motorista">

        <a href="home_motorista.php"> <img src="/imagens/dashboard.png" alt="icon referente ao dashboard"> Dashboard </a>
        <a href="lista_aluno.php"> <img src="/imagens/grupo.png" alt=" icon grupo'">
            Lista De Alunos </a>
        <a href="cadastro_aluno.php"> <img src="/imagens/adicionar-aluno.png" alt="icon perfil">
            Cadastrar Aluno </a>
        <a href="pagamento.php"> <img src="/imagens/carteira.png" alt=" icon carteira'">
            Pagamentos </a>
        <a href="rota.php"> <img src="/imagens/rota_mapa.png" alt=" icon mapa">
            Rotas </a>

    </div>

    <div class="lista_pesquisa">

        <p id="lista">Lista de Alunos</p>

        <form method="GET" id="form">

            <img src="imagens/lupa.png" id="lupa">

            <input id="pesquisa" type="text" name="pesquisa">

            <input type="submit" value="Pesquisar" id="botao_pesquisar">

        </form>

    </div>

    <div class="conteiner">
        <?php
        require_once "conexao.php";
        require_once "funcoes.php";


        if (isset($_GET['pesquisa']) && $_GET['pesquisa'] != "") {/*verifica se vem algo pela url*/ 

            $pesquisa = $_GET['pesquisa'];

            $resultados = BuscarAlunoPorNome($conexao, $pesquisa);
        } else {

            $resultados = ListarAluno($conexao);
        }

        while ($aluno = mysqli_fetch_assoc($resultados)) {

            $nome = $aluno['aluno_nome'];
            $telefone = $aluno['aluno_telefone'];
            $foto = $aluno['aluno_foto'];

            echo "<div class='aluno'>";
            echo "<img src='uploads/perfil/$foto'>";
            echo "<h2>$nome</h2>";
            echo "<p>Telefone: $telefone</p>";
            echo "<a id='detalhar' href='index.php'>Detalhar</a>";
            echo "</div>";
        }
        ?>
    </div>

</body>

</html>