<?php
session_start();
if (!isset($_SESSION['id'])) {
    header("location: index.php");
    exit;
}

require_once 'connect/db_connect.php';

$sql = "SELECT * FROM receitas";
$result = $conn->query($sql);
?>

<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Listar Receitas - Receita Médica</title>
    <link rel="stylesheet" href="css/style.css">
</head>
<body>
    <div class="container">
        <h2>Receitas Médicas</h2>
        <a href="novo.php">Nova Receita</a>
        <table>
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Paciente</th>
                    <th>Médico</th>
                    <th>Descrição</th>
                    <th>Data</th>
                    <th>Ações</th>
                </tr>
            </thead>
            <tbody>
                <?php while ($row = $result->fetch_assoc()): ?>
                    <tr>
                        <td><?php echo $row['id']; ?></td>
                        <td><?php echo $row['paciente']; ?></td>
                        <td><?php echo $row['medico']; ?></td>
                        <td><?php echo $row['descricao']; ?></td>
                        <td><?php echo $row['data']; ?></td>
                        <td>
                            <a href="visualizar.php?id=<?php echo $row['id']; ?>">Visualizar</a>
                            <a href="alterar.php?id=<?php echo $row['id']; ?>">Alterar</a>
                            <a href="apagar.php?id=<?php echo $row['id']; ?>">Apagar</a>
                        </td>
                    </tr>
                <?php endwhile; ?>
            </tbody>
        </table>
    </div>
</body>
</html>
