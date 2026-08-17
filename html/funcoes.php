<?php

require_once 'conexao.php';

function logout()
{
    session_unset();
    session_destroy();

    header("Location: index.php");
    exit();
}


function VerificarLogin()
{
    if (!isset($_SESSION['usuario_id'])) {

        header("Location: index.php");
        exit();
    }
}

function VerificarTipo($tipo)
{
    VerificarLogin();

    if ($_SESSION['usuario_tipo'] != $tipo) {
        header("Location: index.php");
        exit();
    }
}


function Login($conexao, $email, $senha)
{
    $sql = "SELECT * FROM usuario WHERE usuario_email = ? AND usuario_senha = ?";

    $stmt = $conexao->prepare($sql);
    $stmt->bind_param("ss", $email, $senha);
    $stmt->execute();

    $resultado = $stmt->get_result();

    if ($resultado->num_rows > 0) {
        return $resultado->fetch_assoc();
    }

    return false;
}

function ListarAluno($conexao)
{

    return $conexao->query("SELECT * FROM aluno WHERE aluno_status = 'ativo'");
}

function BuscarAluno($conexao, $id)
{

    $sql = "SELECT * FROM aluno WHERE aluno_id = ?";
    $stmt = $conexao->prepare($sql);
    $stmt->bind_param("i", $id);
    $stmt->execute();
    return $stmt->get_result();
}


function InserirAluno($conexao, $aluno_nome, $aluno_endereco, $aluno_cpf, $aluno_telefone, $aluno_data_nasc, $aluno_status, $ponto_ponto_id, $aluno_foto, $aluno_serie, $aluno_responsavel, $aluno_responsavel_telefone)
{

    $sql = "INSERT INTO aluno (aluno_nome, aluno_endereco, aluno_cpf, aluno_telefone,aluno_data_nasc, aluno_status, ponto_ponto_id, aluno_foto, aluno_serie,aluno_responsavel, aluno_responsavel_telefone) VALUES (?,?,?,?,?,?,?,?,?,?,?)";

    $stmt = $conexao->prepare($sql);
    $stmt->bind_param("ssssssissss", $aluno_nome, $aluno_endereco, $aluno_cpf, $aluno_telefone, $aluno_data_nasc, $aluno_status, $ponto_ponto_id, $aluno_foto, $aluno_serie, $aluno_responsavel, $aluno_responsavel_telefone);
    return $stmt->execute();
}

function BuscarAlunoPorNome($conexao, $aluno_nome)
{

    $sql = ("SELECT * FROM aluno WHERE aluno_nome LIKE ? AND aluno_status = 'ativo'");
    $stmt = $conexao->prepare($sql);
    $NomeBusca = "%" . $aluno_nome . "%";
    $stmt->bind_param("s", $NomeBusca);
    $stmt->execute();
    return $stmt->get_result();
}

function AtualizarAluno($conexao, $id, $aluno_nome, $aluno_endereco, $aluno_cpf, $aluno_telefone, $aluno_data_nasc, $aluno_status, $ponto_ponto_id, $aluno_foto, $aluno_serie, $aluno_responsavel, $aluno_responsavel_telefone)
{

    $sql = "UPDATE aluno SET aluno_nome = ?, aluno_endereco = ?, aluno_cpf = ?, aluno_telefone = ?, aluno_data_nasc = ?, aluno_status = ?, ponto_ponto_id = ?, aluno_foto = ?, aluno_serie = ?, aluno_responsavel = ?, aluno_responsavel_telefone = ? WHERE aluno_id = ?";

    $stmt = $conexao->prepare($sql);
    $stmt->bind_param("ssssssissssi", $aluno_nome, $aluno_endereco, $aluno_cpf, $aluno_telefone, $aluno_data_nasc, $aluno_status, $ponto_ponto_id, $aluno_foto, $aluno_serie, $aluno_responsavel, $aluno_responsavel_telefone, $id);

    return $stmt->execute();
}
function ListarPagamentos($conexao)
{

    return $conexao->query("SELECT * FROM pagamento");
}
function BuscarPagamento($conexao, $id)
{

    $sql = "SELECT * FROM pagamento WHERE pagamento_id = ?";

    $stmt = $conexao->prepare($sql);
    $stmt->bind_param("i", $id);
    $stmt->execute();
    return $stmt->get_result();
}
function BuscarPagamentoAluno($conexao, $aluno_id)
{

    $sql = "SELECT * FROM pagamento WHERE aluno_aluno_id = ?";

    $stmt = $conexao->prepare($sql);
    $stmt->bind_param("i", $aluno_id);
    $stmt->execute();
    return $stmt->get_result();
}

function AtualizarPagamento($conexao, $id, $pagamento_status, $pagamento_tipo, $pagamento_comprovante)
{

    $sql = "UPDATE pagamento SET pagamento_status = ?, pagamento_tipo = ?, pagamento_comprovante = ? WHERE pagamento_id = ?";

    $stmt = $conexao->prepare($sql);
    $stmt->bind_param("sssi", $pagamento_status, $pagamento_tipo, $pagamento_comprovante, $id);

    return $stmt->execute();
}

function ListarPontos($conexao)
{

    return $conexao->query("SELECT * FROM ponto");
}

function BuscarPonto($conexao, $id)
{

    $sql = "SELECT * FROM ponto WHERE ponto_id = ?";

    $stmt = $conexao->prepare($sql);
    $stmt->bind_param("i", $id);
    $stmt->execute();
    return $stmt->get_result();
}

function BuscarAlunoPonto($conexao, $ponto_id)
{

    $sql = "SELECT * FROM aluno WHERE ponto_ponto_id = ?";

    $stmt = $conexao->prepare($sql);
    $stmt->bind_param("i", $ponto_id);
    $stmt->execute();
    return $stmt->get_result();
}

function InativarAluno($conexao, $id)
{

    $sql = "UPDATE aluno  SET aluno_status = 'inativo' WHERE aluno_id = ?";

    $stmt = $conexao->prepare($sql);
    $stmt->bind_param("i", $id);

    return $stmt->execute();
}

function AtivarAluno($conexao, $id)
{

    $sql = "UPDATE aluno SET aluno_status = 'ativo' WHERE aluno_id = ?";

    $stmt = $conexao->prepare($sql);
    $stmt->bind_param("i", $id);
    return $stmt->execute();
}

function ListarAlunoInativo($conexao)
{

    return $conexao->query("SELECT * FROM aluno WHERE aluno_status = 'ativo'");
}

function ListarStatusPagamento($conexao)
{

    $sql = " SELECT aluno.aluno_id, aluno.aluno_nome, aluno.aluno_telefone, aluno.aluno_serie, pagamento.pagamento_data, pagamento.pagamento_status

    FROM aluno LEFT JOIN pagamento ON aluno.aluno_id = pagamento.aluno_aluno_id

    LEFT JOIN ( SELECT aluno_aluno_id, MAX(pagamento_data) AS ultima_data

    FROM pagamento GROUP BY aluno_aluno_id ) ultimo_pagamento

    ON pagamento.aluno_aluno_id = ultimo_pagamento.aluno_aluno_id AND pagamento.pagamento_data = ultimo_pagamento.ultima_data

    ORDER BY aluno.aluno_nome";

    $stmt = $conexao->prepare($sql);
    $stmt->execute();
    return $stmt->get_result();
}

function uploadCapa($arquivo)
{

    if ($arquivo['error'] != 0) {
        return "";
    }

    $nomeArquivo = time() . "_" . basename($arquivo['name']);

    move_uploaded_file(
        $arquivo['tmp_name'],
        "uploads/perfil/" . $nomeArquivo
    );

    return $nomeArquivo;
}

function uploadComprovante($arquivo)
{

    if ($arquivo['error'] != 0) {
        return "";
    }

    $nomeArquivo = time() . "_" . basename($arquivo['name']);

    move_uploaded_file(
        $arquivo['tmp_name'],
        "uploads/comprovantes/" . $nomeArquivo
    );

    return $nomeArquivo;
}

function InserirPagamento($conexao, $pagamento_mes, $pagamento_data, $pagamento_valor, $pagamento_status, $pagamento_comprovante, $pagamento_tipo, $aluno_aluno_id)
{

    $sql = "INSERT INTO pagamento (pagamento_mes, pagamento_data, pagamento_valor, pagamento_status, pagamento_comprovante, pagamento_tipo, aluno_aluno_id) VALUES (?,?,?,?,?,?,?)";

    $stmt = $conexao->prepare($sql);

    $stmt->bind_param("ssdsssi", $pagamento_mes, $pagamento_data, $pagamento_valor, $pagamento_status, $pagamento_comprovante, $pagamento_tipo, $aluno_aluno_id);

    return $stmt->execute();

}