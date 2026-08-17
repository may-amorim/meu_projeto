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
        img {
            width: 60px;
            height: 60px;
        }

        .conteiner {
            border: none;
            display: flex;
            margin-left: 220px;
            margin-top: 20px;
            flex-wrap: wrap;/*um do lado do outro,qnd nn caber quebra linha */
            gap: 20px;

        }

        .aluno {
            border: solid;
            border-color: gray;
            margin: 20px;
            padding: 20px;
        }

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

            display: flex;
            align-items: center;
            gap: 10px;
            text-decoration: none;

        }

        .menu_motorista img {
            width: 22px;
            height: 22px;
        }

        .menu_motorista a:hover {
            background-color: darkgrey;
        }

        .lista_pesquisa {

            margin-left: 250px;
            margin-top: 110px;
            padding: 20px;
            display: flex;
            justify-content: space-between;
            align-items: center;

        }

        #lista {

            font-size: 22px;
            font-weight: bold;
            font-family: 'Alfa Slab One', serif;
            margin: 0;

        }

        #lupa {

            width: 22px;
            height: 22px;

        }

        #form {

            display: flex;
            align-items: center;
            gap: 10px;

        }

        #pesquisa {

            width: 250px;
            height: 35px;
            padding: 0 10px;
            border: 1px solid #d0d0d0;
            border-radius: 5px;
            outline: none;

        }

        #botao_pesquisar {

            width: 110px;
            height: 37px;
            background: #191b4d;
            color: white;
            border: none;
            border-radius: 5px;
            cursor: pointer;

        }

        #botao_pesquisar:hover {

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