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
           ÁREA PRINCIPAL
        ================================= */

        .conteudo {
            margin-left: 240px;

            padding: 110px 30px 30px 30px;

            min-height: 100vh;

            background-color: #f5f7fa;
        }


        /* ================================
           CARDS
        ================================= */

        .cards {
            margin-top: 15px;

            display: flex;

            gap: 25px;

            flex-wrap: wrap;
        }


        .card_consulta {
            padding: 20px;

            width: 220px;
            height: 140px;

            border-radius: 12px;

            background-color: white;

            border: 1px solid #e5e7eb;

            display: flex;

            flex-direction: column;

            justify-content: center;

            box-shadow: 0 4px 12px rgba(0, 0, 0, 0.08);

            transition: 0.2s;
        }


        .card_consulta:hover {
            transform: translateY(-3px);

            box-shadow: 0 7px 16px rgba(0, 0, 0, 0.12);
        }


        .card_consulta p {
            margin: 0;

            font-size: 16px;

            font-weight: 600;

            color: #555;
        }


        .numero {
            margin-top: 15px;

            font-size: 38px;

            font-weight: bold;
        }


        /* ================================
           TÍTULO DA TABELA
        ================================= */

        .conteudo h2 {
            margin-top: 35px;

            margin-bottom: 15px;

            font-size: 22px;

            color: #222;
        }


        /* ================================
           TABELA
        ================================= */

        #tabela {
            margin-top: 10px;

            width: 100%;

            border-collapse: separate;

            border-spacing: 0;

            border-radius: 12px;

            overflow: hidden;

            background-color: white;

            border: 1px solid #e5e7eb;

            box-shadow: 0 4px 12px rgba(0, 0, 0, 0.08);
        }


        #tabela th {
            padding: 14px 15px;

            text-align: left;

            font-size: 14px;

            color: #444;

            background-color: #f1f3f5;

            border-bottom: 1px solid #ddd;
        }


        #tabela td {
            padding: 14px 15px;

            font-size: 14px;

            color: #444;

            border-bottom: 1px solid #eeeeee;
        }


        #tabela tr:last-child td {
            border-bottom: none;
        }


        #tabela tr:hover td {
            background-color: #fafafa;
        }


        /* ================================
           STATUS DE PAGAMENTO
        ================================= */

        .status {
            display: inline-block;

            margin: 0;

            padding: 6px 10px;

            border-radius: 20px;

            font-size: 12px;

            font-weight: 600;

            white-space: nowrap;
        }


        .status.pago {
            background-color: #e2f5e7;

            color: #218838;
        }


        .status.pendente {
            background-color: #fff3cd;

            color: #946c00;
        }


        /* ================================
           LINKS DA TABELA
        ================================= */

        #tabela a {
            display: inline-block;

            padding: 7px 10px;

            border-radius: 7px;

            text-decoration: none;

            font-size: 13px;

            font-weight: 600;

            transition: 0.2s;
        }


        /* Visualizar */

        #tabela a[href*="visualizar_pagamento"] {
            background-color: #e7f0ff;

            color: #2563eb;
        }


        #tabela a[href*="visualizar_pagamento"]:hover {
            background-color: #d8e7ff;
        }


        /* Registrar pagamento */

        #tabela a[href*="registrar_pagamento"] {
            background-color: #e3f6e9;

            color: #218838;
        }


        #tabela a[href*="registrar_pagamento"]:hover {
            background-color: #d2f0da;
        }


        /* ================================
           RESPONSIVIDADE
        ================================= */

        @media (max-width: 1000px) {

            .cards {
                gap: 15px;
            }

            .card_consulta {
                width: 200px;
            }

            .conteudo {
                margin-left: 225px;
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


            .conteudo {
                margin-left: 0;

                padding: 25px 15px;
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


            .cards {
                flex-direction: column;
            }


            .card_consulta {
                width: 100%;
            }


            #tabela {
                display: block;

                overflow-x: auto;

                white-space: nowrap;
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
DSM$$$08dsm
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

    <div class="conteudo">


        <div class="cards">

            <div class="card_consulta">

                <p>Total de alunos</p>

                <div class="numero" style="color: blue;">

                    <?php
                    require_once "conexao.php";
                    $sql = "SELECT COUNT(*) AS total_alunos FROM aluno WHERE aluno_status = 'ativo'";
                    $comando = mysqli_prepare($conexao, $sql);
                    mysqli_stmt_execute($comando);
                    $resultados = mysqli_stmt_get_result($comando);
                    $aluno = mysqli_fetch_assoc($resultados);
                    echo $aluno['total_alunos'];

                    ?>

                </div>

            </div>


            <div class="card_consulta">

                <p>Pagamentos Pendentes</p>

                <div class="numero" style="color: red;">

                    <?php

                    require_once "conexao.php";

                    $sql = "SELECT((SELECT COUNT(*) FROM aluno WHERE aluno_status = 'ativo') - (SELECT COUNT(*) FROM pagamento WHERE pagamento_status = 'pago')) AS pagamentos_pendentes";

                    $comando = mysqli_prepare($conexao, $sql);

                    mysqli_stmt_execute($comando);

                    $resultados = mysqli_stmt_get_result($comando);

                    $pagamento = mysqli_fetch_assoc($resultados);

                    echo $pagamento['pagamentos_pendentes'];

                    ?>

                </div>

            </div>


            <div class="card_consulta">

                <p>Pagamentos Recebidos</p>

                <div class="numero" style="color: green;">

                    <?php

                    require_once "conexao.php";

                    $sql = "SELECT COUNT(*) AS pagamentos_recebidos FROM pagamento WHERE pagamento_status = 'pago'";

                    $comando = mysqli_prepare($conexao, $sql);

                    mysqli_stmt_execute($comando);

                    $resultados = mysqli_stmt_get_result($comando);

                    $pagamento = mysqli_fetch_assoc($resultados);

                    echo $pagamento['pagamentos_recebidos'];

                    ?>

                </div>

            </div>

        </div>


        <div>

            <h2>Status de Pagamentos</h2>

            <table id="tabela">

                <?php

                require_once "conexao.php";
                require_once "funcoes.php";

            echo "<tr>

                <th>Aluno</th>
                <th>Telefone</th>
                <th>Série</th>
                <th>Último pagamento</th>
                <th>Status</th>
                <th>Ação</th>
                
            </tr>";


                $resultados = ListarStatusPagamento($conexao);

                while ($a = $resultados->fetch_assoc()) {

                    $id = $a['aluno_id'];
                    $nome = $a['aluno_nome'];
                    $telefone = $a['aluno_telefone'];
                    $serie = $a['aluno_serie'];
                    $data = $a['pagamento_data'];
                    $status = $a['pagamento_status'];

                    echo "<tr>";

                    echo "<td>$nome</td>";
                    echo "<td>$telefone</td>";
                    echo "<td>$serie</td>";
                    echo "<td>$data</td>";

                    echo "<td>";

                    if ($status == "pago") {
                        echo "<p class='status pago'>Pagamento em dia</p>";
                    } else {
                        echo "<p class='status pendente'>Pagamento pendente</p>";
                    }

                    echo "</td>";
                    echo "<td>";

                    if ($status == "pago") {
                        echo "<a href='visualizar_pagamento.php?id=$id'>Visualizar</a>";
                    } else {
                        echo "<a href='registrar_pagamento.php?id=$id'>Registrar Pagamento</a>";
                    }

                    echo "</td>";
                    echo "</tr>";
                }

                ?>

            </table>

        </div>

    </div>

</body>

</html>
