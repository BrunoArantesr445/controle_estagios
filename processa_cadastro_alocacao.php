<?php
include_once 'Database.php';
include_once 'Alocacao.php';

$database = new Database();
$db = $database->getConnection();

$alocacao = new Alocacao($db);

$alocacao->nome = $_POST['nome'];
$alocacao->local = $_POST['local'];
$alocacao->departamento = $_POST['departamento'];

if ($alocacao->create()) {
    $msg = "Alocação realizada com sucesso!";
    header("location: cadastro_alocacao.php?txt=" . urlencode($msg));
    exit;
} else {
    $msg = "Não foi possível realizar a alocação. Verifique os dados e tente novamente.";
    header("location: cadastro_alocacao.php?txt=" . urlencode($msg));
    exit;
}
?>
