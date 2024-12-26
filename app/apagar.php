<?php
session_start();
if (!isset($_SESSION['id'])) {
    header("location: index.php");
    exit;
}

require_once 'connect/db_connect.php';

$id = $_GET['id'];
$sql = "DELETE FROM receitas WHERE id = ?";
if ($stmt = $conn->prepare($sql)) {
    $stmt->bind_param("i", $id);
    if ($stmt->execute()) {
        $success = "Receita apagada com sucesso.";
    } else {
        $error = "Erro ao apagar receita.";
    }
    $stmt->close();
}
$conn->close();
header("location: listar.php");
?>
