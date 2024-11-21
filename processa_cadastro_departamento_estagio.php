<?php
include_once 'Database.php';
include_once 'LocalDepartamento.php';

$database = new Database();
$db = $database->getConnection();

$local_estagio = new LocalDepartamento($db);

$local_estagio->local = $_POST['local'];
$local_estagio->departamento = $_POST['departamento'];
$local_estagio->especialidade = $_POST['especialidade'];
$local_estagio->limite_vagas = $_POST['limite_vagas'];
$local_estagio->horario_disponivel = $_POST['horario_disponivel'];
$local_estagio->professor_id = $_POST['professor_id'];
$local_estagio->fase_estagio = $_POST['fase_estagio'];

// Verifique se o método create() está sendo chamado corretamente no objeto
if ($local_estagio->create()) {
    $msg = "Departamento cadastrado com sucesso!";
    // Redireciona e passa a mensagem via URL
    header("Location: cadastro_departamento_estagio.php?txt=" . urlencode($msg));
    exit();
} else {
    $msg = "Não foi possível cadastrar o departamento. Verifique os dados e tente novamente.";
    // Redireciona com a mensagem de erro
    header("Location: cadastro_departamento_estagio.php?txt=" . urlencode($msg));
    exit();
}
?>

