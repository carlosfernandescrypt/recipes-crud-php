<?php
session_start();
if (!isset($_SESSION['id'])) {
    header("location: index.php");
    exit;
}

require_once 'connect/db_connect.php';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $paciente = $_POST['paciente'];
    $medico = $_POST['medico'];
    $descricao = $_POST['descricao'];
    $data = $_POST['data'];

    $sql = "INSERT INTO receitas (paciente, medico, descricao, data) VALUES (?, ?, ?, ?)";
    if ($stmt = $conn->prepare($sql)) {
        $stmt->bind_param("ssss", $paciente, $medico, $descricao, $data);
        if ($stmt->execute()) {
            $success = "Receita adicionada com sucesso.";
        } else {
            $error = "Erro ao adicionar receita.";
        }
        $stmt->close();
    }
    $conn->close();
}
?>

<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Nova Receita - Receita Médica</title>
    <link rel="stylesheet" href="css/style.css">
</head>
<body>
    <div class="container">
        <h2>Nova Receita</h2>
        <?php if (isset($success)) echo "<p class='success'>$success</p>"; ?>
        <?php if (isset($error)) echo "<p class='error'>$error</p>"; ?>
        <form action="novo.php" method="post">
            <label for="paciente">Paciente:</label>
            <input type="text" name="paciente" required>
            <label for="medico">Médico:</label>
            <input type="text" name="medico" required>
            <label for="descricao">Descrição:</label>
            <textarea name="descricao" required></textarea>
            <label for="data">Data:</label>
            <input type="date" name="data" required>
            <button type="submit">Adicionar</button>
        </form>
    </div>
</body>
</html>
