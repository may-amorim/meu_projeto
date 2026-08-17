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

        #p_motorista {
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

        .menu_motorista {
            background: #d9d9d9;
            padding: 10px;
            border-radius: 5px;
            display: flex;
            flex-direction: column;
            gap: 8px;
            width: 200px;
            margin-top: 20px;
            position: fixed;

        }

        .menu_motorista a {
            padding: 10px;
            background: white;
            border: none;
            text-align: left;
            text-decoration: none;
            display: flex;
            align-items: center;
            gap: 10px;

        }

        .menu_motorista img {
            width: 22px;
            height: 22px;
        }

        .menu_motorista a:hover {
            background-color: darkgrey;
            text-decoration: none;

        }

        .conteudo {
            margin-left: 300px;
            padding: 20px;
            margin-top: 100px;
            background-color: white;
        }

        .cards {
            margin-top: 30px;
            display: flex;
            gap: 120px;
            /* espaço entre os cards */
        }

        .card_consulta {
            padding: 20px;
            width: 220px;
            height: 140px;
            border-radius: 12px;
            background-color: #d9d9d9;

            display: flex;
            flex-direction: column;
            justify-content: center;

            box-shadow: 0px 4px 10px rgba(0, 0, 0, 0.2);
        }

        .card_consulta p {
            margin: 0;
            font-size: 18px;
            font-weight: bold;
        }

        .numero {
            margin-top: 20px;
            font-size: 40px;
            font-weight: bold;
        }

        #tabela {
            margin-top: 30px;
            padding: 20px;
            width: 100%;
            height: 100%;
            border-radius: 12px;
            background-color: #d9d9d9;

            box-shadow: 0px 4px 10px rgba(0, 0, 0, 0.2);

        }

        #tabela th {

            padding: 15px;
            text-align: left;
            font-size: 16px;
        }

        #tabela td {
            padding: 15px;
            border-bottom: 1px solid #b0b0b0;
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