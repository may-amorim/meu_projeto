<?php

require_once "conexao.php";
require_once "funcoes.php";

$aluno_aluno_id = $_GET['id'];

$pagamento_mes = $_POST['pagamento_mes'];
$pagamento_data = $_POST['pagamento_data'];
$pagamento_valor = $_POST['pagamento_valor'];
$pagamento_tipo = $_POST['pagamento_tipo'];

$pagamento_status = "pago";

$pagamento_comprovante = uploadComprovante($_FILES['pagamento_comprovante']);

$resultado = InserirPagamento(
    $conexao,
    $pagamento_mes,
    $pagamento_data,
    $pagamento_valor,
    $pagamento_status,
    $pagamento_comprovante,
    $pagamento_tipo,
    $aluno_aluno_id
);

if($resultado){

    header("Location: home_motorista.php");

}else{

    echo "Erro ao registrar pagamento.";

}