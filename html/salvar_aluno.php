<?php

require_once "conexao.php";
require_once "funcoes.php";

$aluno_nome = $_POST['aluno_nome'];
$aluno_endereco = $_POST['aluno_endereco'];
$aluno_cpf = $_POST['aluno_cpf'];
$aluno_telefone = $_POST['aluno_telefone'];
$aluno_data_nasc = $_POST['aluno_data_nasc'];
$aluno_serie = $_POST['aluno_serie'];
$aluno_responsavel = $_POST['aluno_responsavel'];
$aluno_responsavel_telefone = $_POST['aluno_responsavel_telefone'];
$ponto_ponto_id = $_POST['ponto_ponto_id'];

$aluno_status = "ativo";

$aluno_foto = uploadCapa($_FILES['aluno_foto']);

$resultado = InserirAluno(
    $conexao,
    $aluno_nome,
    $aluno_endereco,
    $aluno_cpf,
    $aluno_telefone,
    $aluno_data_nasc,
    $aluno_status,
    $ponto_ponto_id,
    $aluno_foto,
    $aluno_serie,
    $aluno_responsavel,
    $aluno_responsavel_telefone
);

if($resultado){
    header("Location: lista_aluno.php");
}else{
    echo "Erro ao cadastrar aluno.";
    header("Location: cadastro_aluno.php");
}