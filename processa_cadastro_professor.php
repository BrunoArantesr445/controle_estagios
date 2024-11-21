<?php
include_once 'Database.php';
include_once 'Professor.php';

$database = new Database();
$db = $database->getConnection();

$professor = new Professor($db);

// Atribuição dos valores recebidos via POST
$professor->nome = $_POST['nome'];
$professor->disponibilidade_horario = $_POST['disponibilidade_horario'];
$professor->especialidade = $_POST['especialidade'];
$professor->telefone = $_POST['telefone'];
$professor->carga_horaria = $_POST['carga_horaria']; // Corrigido aqui para 'carga_horaria'

if ($professor->create()) {
    $msg = "Supervisor cadastrado com sucesso!";
    header("location: cadastro_professor.php?txt=" . urlencode($msg));
    exit;
} else {
    $msg = "Não foi possível cadastrar o supervisor. Verifique os dados e tente novamente.";
    header("location: cadastro_professor.php?txt=" . urlencode($msg));
    exit;
}
?>
