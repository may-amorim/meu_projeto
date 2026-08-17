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
    <link rel="stylesheet" href="style.css">

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

        .card_formulario {

            width: 850px;
            background: white;
            padding: 30px;
            border-radius: 12px;
            box-shadow: 0 4px 12px rgba(0, 0, 0, .15);

        }

        h3 {
            font-size: 18px;
            margin-bottom: 15px;
        }


        .form {
            margin-bottom: 6px;
            font-size: 13px;
            color: #444;
        }

        .input {
            margin-bottom: 20px;
        }

        .input p {
            margin-bottom: 8px;
            font-size: 14px;
            color: #333;
        }

        .input input {
            width: 100%;
            height: 30px;
            padding: 8px;
            border: 1px solid;
            border-radius: 3px;
            border-color: #e9e9e9;
            background: white;
            outline: none;
            font-size: 14px;
        }

        .botoes {
            display: flex;
            justify-content: flex-end;
            gap: 15px;
            margin-top: 25px;
        }


        #botao_cadastrar {

            width: 220px;
            height: 42px;
            background: #191b4d;
            color: white;
            border: none;
            border-radius: 4px;
            cursor: pointer
        }

        #botao_cadastrar:hover {

            background: #23276d;

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

        <h2>Cadastrar Novo Aluno</h2>

        <div class="card_formulario">

            <form action="salvar_aluno.php" method="POST" enctype="multipart/form-data">

                <h3>Informações do Aluno</h3>

                <div class="input">

                    <p class="form">Nome Completo</p>
                    <input type="text" name="aluno_nome" required>

                </div>

                <div class="input">
                    <p class="form">Série</p>
                    <input type="text" name="aluno_serie" required>

                </div>

                <div class="input">

                    <p class="form">Telefone</p>
                    <input type="text" name="aluno_telefone" required>

                </div>
                <div class="input">

                    <p class="form">CPF</p>
                    <input type="text" name="aluno_cpf" required>

                </div>

                <div class="input">

                    <p class="form">Endereço</p>
                    <input type="text" name="aluno_endereco" required>

                </div>

                <div class="input">

                    <p class="form">Data de Nascimento</p>
                    <input type="date" name="aluno_data_nasc" required>

                </div>

                <div class="input">

                    <p class="form">Foto do Aluno</p>
                    <input type="file" name="aluno_foto">

                </div>

                <h3>Informações do Responsável</h3>
                <div class="input">

                    <p class="form">Nome do Responsável</p>
                    <input type="text" name="aluno_responsavel" required>

                </div>

                <div class="input">

                    <p class="form">Telefone do Responsável</p>
                    <input type="text" name="aluno_responsavel_telefone" required>

                </div>

                <h3>Informações da Rota</h3>
                <div class="input">
                    <p class="form">Ponto de Embarque</p>

                    <select name="ponto_ponto_id">

                        <?php
                        $sql = "SELECT * FROM ponto";
                        $comando = mysqli_prepare($conexao, $sql);
                        mysqli_stmt_execute($comando);
                        $resultados = mysqli_stmt_get_result($comando);
                        while ($ponto = mysqli_fetch_assoc($resultados)) {

                            $id = $ponto['ponto_id'];
                            $nome = $ponto['ponto_nome'];

                            echo "<option value='$id'>$nome</option>";
                        }

                        mysqli_stmt_close($comando);

                        ?>

                    </select> <br>
                </div>

                <div class="botoes">

                    <input type="submit" value="Cadastrar Aluno" id="botao_cadastrar">

                </div>

            </form>

        </div>

    </div>

</body>

</html>