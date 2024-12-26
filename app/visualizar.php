<?php
session_start();
if (!isset($_SESSION['id'])) {
    header("location: index.php");
    exit;
}

require_once 'connect/db_connect.php';

$id = $_GET['id'];
$sql = "SELECT * FROM receitas WHERE id = ?";
if ($stmt = $conn->prepare($sql)) {
    $stmt->bind_param("i", $id);
    $stmt->execute();
    $result = $stmt->get_result();
    $receita = $result->fetch_assoc();
    $stmt->close();
}
$conn->close();
?>

<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Visualizar Receita - Receita Médica</title>
    <link rel="stylesheet" href="css/style.css">
</head>
<body>
    <div class="container">
        <h2>Visualizar Receita</h2>
        <p><strong>Paciente:</strong> <?php echo $receita['paciente']; ?></p>
        <p><strong>Médico:</strong> <?php echo $receita['medico']; ?></p>
        <p><strong>Descrição:</strong> <?php echo $receita['descricao']; ?></p>
        <p><strong>Data:</strong> <?php echo $receita['data']; ?></p>
        <a href="listar.php">Voltar</a>
    </div>
</body>
</html>
