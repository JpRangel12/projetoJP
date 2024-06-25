<?php
include 'conecta.php';
if (isset($_GET['id'])) {
    $pessoa_id = $_GET['id'];

 
    $sql = "DELETE FROM pessoas WHERE id=$pessoa_id";


    if ($conn->query($sql) === TRUE) {
        echo "Pessoa excluída com sucesso!";
    } else {
        echo "Erro ao excluir pessoa: " . $conn->error;
    }
} else {
    echo "ID da pessoa não fornecido.";
}

$conn->close();


header("Location: visualiza_pessoas.php");
exit();
?>
