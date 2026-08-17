<?php

require_once "conexao.php";
require_once "funcoes.php";

echo "<br>";
echo "<h1> TESTES COMPLETOS DO SISTEMA</h1>";

// Listar Aluno

echo "<h2>Listar Alunos</h2>";

$aluno = ListarAluno($conexao);

while ($a = $aluno->fetch_assoc()) {
    print_r($a);
    echo "<br>";
}

//Inserir Aluno

echo "<h2>Inserir Aluno</h2>";
if (

    InserirAluno($conexao, "maysa", "rua 23", "040.040.500-04", "(62)0099-9009", "2009-04-20", "ativo", 2, "logo.png", "3°EM", "Luciana Costa de Amorim", "(62)8933-8888")

) {

    echo "Aluno inserido com sucesso";
} else {

    echo "Erro ao inserir aluno";
}

//buscar aluno por nome

echo "<h2>Buscar Aluno Por Nome</h2>";


$aluno = BuscarAlunoPorNome($conexao, "May");

while ($a = $aluno->fetch_assoc()) {
    print_r($a);
    echo "<br>";
}

echo "<h2> Buscar Aluno Por ID</h2>";

$aluno = BuscarAluno($conexao, 1);

print_r($aluno->fetch_assoc());
echo "<br>";

echo "<h2> Atualizar Aluno</h2>";

if (

    AtualizarAluno($conexao, 1, "May Atualizada", "Rua Nova", "040.040.050-04", "(62)88899-8000", "2009-04-20", "ativo", 2, "logo.png", "3°EM", "Luciana", "(62)88888-0000")
) {

    echo "Aluno atualizado com sucesso";
} else {

    echo "Erro ao atualizar aluno";
}

echo "<h2> Inativar Aluno</h2>";

if (InativarAluno($conexao, 1)) {

    echo "Aluno inativado com sucesso";
} else {

    echo "Erro ao inativar aluno";
}

echo "<h2>Ativar Aluno</h2>";

if (AtivarAluno($conexao, 1)) {

    echo "Aluno ativado com sucesso";
} else {

    echo "Erro ao ativar aluno";
}

echo "<h2>Listar Alunos Inativos</h2>";

$alunos = ListarAlunoInativo($conexao);

while ($a = $alunos->fetch_assoc()) {

    print_r($a);
    echo "<br>";
}

echo "<h2> Listar Pagamentos</h2>";

$pagamentos = ListarPagamentos($conexao);

while ($p = $pagamentos->fetch_assoc()) {

    print_r($p);
    echo "<br>";
}

echo "<h2> Atualizar Pagamento</h2>";

if (AtualizarPagamento($conexao, 1, "pago", "pix", "comprovante.png")) {

    echo "Pagamento atualizado";
} else {

    echo "Erro ao atualizar pagamento";
}

echo "<h2>Listar Pontos</h2>";

$pontos = ListarPontos($conexao);

while ($p = $pontos->fetch_assoc()) {

    print_r($p);
    echo "<br>";
}


echo "<h2> Buscar Ponto Por ID</h2>";

$ponto = BuscarPonto($conexao, 1);
print_r($ponto->fetch_assoc());

echo "<h2> Buscar Alunos Por Ponto</h2>";

$alunos = BuscarAlunoPonto($conexao, 2);

while ($a = $alunos->fetch_assoc()) {

    print_r($a);
    echo "<br>";
}


echo "<h2>Status de Pagamentos</h2>";

$resultados = ListarStatusPagamento($conexao);

while ($a = $resultados->fetch_assoc()) {

    print_r($a);
    echo "<br>";
}

?>