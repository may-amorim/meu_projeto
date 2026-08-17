<?php

session_start();

require_once "funcoes.php";

VerificarLogin();

?>

<?php

require_once "conexao.php";

$id = $_GET['id'];

$sql = "SELECT aluno_nome FROM aluno WHERE aluno_id = ?";
$comando = mysqli_prepare($conexao, $sql);
mysqli_stmt_bind_param($comando, "i", $id);
mysqli_stmt_execute($comando);
$resultado = mysqli_stmt_get_result($comando);

$aluno = mysqli_fetch_assoc($resultado);
$nome = $aluno['aluno_nome'];
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Registrar Pagamento</title>

    <link rel="icon" type="image/png" href="logo.png">

    <style>
#cabecalho{
            display:flex;
            align-items:center;
            gap:15px;
            position:fixed;
            top:0;
            left:0;
            width:100%;
            padding:10px;
            z-index:1000;
            border-bottom:1px solid gray;
            background:white;
        }

        #logo{
            width:69px;
            height:69px;
            border-radius:100%;
        }

        #textos{
            display:flex;
            flex-direction:column;
        }

        #t_escolar{
            font-size:20px;
            font-weight:bold;
            margin:0;
        }

        #p_motorista{
            margin:0;
            color:gray;
        }

        #logout{
            margin-left:auto;
            margin-right:40px;
        }

        #sair {

            width: 22px;
            height: 22px;

        }

        .menu_motorista{
            background:#d9d9d9;
            padding:10px;
            border-radius:5px;
            display:flex;
            flex-direction:column;
            gap:8px;
            width:200px;
            margin-top:20px;
            position:fixed;
        }

        .menu_motorista a{
            padding:10px;
            background:white;
            text-decoration:none;
            display:flex;
            align-items:center;
            gap:10px;
            color:black;
        }

        .menu_motorista a:hover{
            background:darkgrey;
        }

        .menu_motorista img{
            width:22px;
            height:22px;
        }

        .conteudo{
            margin-left:300px;
            padding:20px;
            margin-top:100px;
            background:white;
        }

        .card_formulario{
            width:850px;
            background:white;
            padding:30px;
            border-radius:12px;
            box-shadow:0 4px 12px rgba(0,0,0,.15);
        }

        h3{
            font-size:18px;
            margin-bottom:15px;
        }

        .form{
            margin-bottom:6px;
            font-size:13px;
            color:#444;
        }

        input,
        select{
            width:100%;
            height:30px;
            border:1px solid #d0d0d0;
            border-radius:3px;
            padding:8px;
            background:white;
        }

        .botoes{
            display:flex;
            justify-content:flex-end;
            margin-top:25px;
        }

        #botao_cadastrar{
            width:220px;
            height:42px;
            background:#191b4d;
            color:white;
            border:none;
            border-radius:4px;
            cursor:pointer;
        }

        #botao_cadastrar:hover{
            background:#23276d;
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


        <h2>Registrar Pagamento</h2>

        <div class="card_formulario">
            <form action="salvar_pagamento.php?id=<?php echo $id; ?>" method="POST" enctype="multipart/form-data">

                <p class="form">Aluno</p>
                <input type="text" value="<?php echo $nome; ?>">

                <br><br>

                <p class="form">Mês</p>

                <select name="pagamento_mes" required>

                    <option value="">Selecione</option>
                    <option value="Janeiro">Janeiro</option>
                    <option value="Fevereiro">Fevereiro</option>
                    <option value="Março">Março</option>
                    <option value="Abril">Abril</option>
                    <option value="Maio">Maio</option>
                    <option value="Junho">Junho</option>
                    <option value="Julho">Julho</option>
                    <option value="Agosto">Agosto</option>
                    <option value="Setembro">Setembro</option>
                    <option value="Outubro">Outubro</option>
                    <option value="Novembro">Novembro</option>
                    <option value="Dezembro">Dezembro</option>

                </select>

                <br><br>

                <p class="form">Data do Pagamento</p>
                <input type="date" name="pagamento_data" required>

                <br><br>

                <p class="form">Valor</p>
                <input type="number" name="pagamento_valor" step="0.01" required>

                <br><br>

                <p class="form">Tipo de Pagamento</p>

                <select name="pagamento_tipo" required>

                    <option value="">Selecione</option>
                    <option value="pix">Pix</option>
                    <option value="dinheiro">Dinheiro</option>

                </select>

                <br><br>

                <p class="form">Comprovante</p>
                <input type="file" name="pagamento_comprovante">

                <br><br>

                <div class="botoes">

                    <input type="submit" value="Registrar Pagamento" id="botao_cadastrar">

                </div>

            </form>
        </div>
    </div>
</body>

</html>