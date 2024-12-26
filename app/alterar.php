<?php
session_start();
if (!isset($_SESSION['id'])) {
    header("location: index.php");
    exit;
}

require_once 'connect/db_connect.php';

$id = $_GET['id'];
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $paciente = $_POST['paciente'];
    $medico = $_POST['medico'];
    $descricao = $_POST['descricao'];
    $data = $_POST['data'];

    $sql = "UPDATE receitas SET paciente = ?, medico = ?, descricao = ?, data = ? WHERE id = ?";
    if ($stmt = $conn->prepare($sql)) {
        $stmt->bind_param("ssssi", $paciente, $medico, $descricao, $data, $id);
        if ($stmt->execute()) {
            $success = "Receita atualizada com sucesso.";
        } else {
            $error = "Erro ao atualizar receita.";
        }
        $stmt->close();
    }

    $sql = "SELECT * FROM receitas WHERE id = ?";
    if ($stmt = $conn->prepare($sql)) {
        $stmt->bind_param("i", $id);
        $stmt->execute();
        $result = $stmt->get_result();
        $receita = $result->fetch_assoc();
        $stmt->close();
    }
    $conn->close();
} else {
    $sql = "SELECT * FROM receitas WHERE id = ?";
    if ($stmt = $conn->prepare($sql)) {
        $stmt->bind_param("i", $id);
        $stmt->execute();
        $result = $stmt->get_result();
        $receita = $result->fetch_assoc();
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
    <title>Alterar Receita - Receita Médica</title>
    <link rel="stylesheet" href="css/style.css">
</head>
<body>
    <div class="container">
        <h2>Alterar Receita</h2>
        <?php if (isset($success)) echo "<p class='success'>$success</p>"; ?>
        <?php if (isset($error)) echo "<p class='error'>$error</p>"; ?>
        <form action="alterar.php?id=<?php echo $id; ?>" method="post">
            <label for="paciente">Paciente:</label>
            <input type="text" name="paciente" value="<?php echo $receita['paciente']; ?>" required>
            <label for="medico">Médico:</label>
            <input type="text" name="medico" value="<?php echo $receita['medico']; ?>" required>
            <label for="descricao">Descrição:</label>
            <textarea name="descricao" required><?php echo $receita['descricao']; ?></textarea>
            <label for="data">Data:</label>
            <input type="date" name="data" value="<?php echo $receita['data']; ?>" required>
            <button type="submit">Atualizar</button>
        </form>
    </div>
</body>
</html>