<?php
include 'conecta.php';
$sql = "SELECT * FROM pessoas";
$result_pessoas = $conn->query($sql);



if ($result_pessoas->num_rows > 0) {
    echo "<h2>Pessoas Cadastradas:</h2>";
    while ($row_pessoa = $result_pessoas->fetch_assoc()) {
        echo "<p><strong>{$row_pessoa['nome']} {$row_pessoa['sobrenome']}</strong> - Idade: {$row_pessoa['idade']}</p>";

       
        $pessoa_id = $row_pessoa['id'];
        $sql_medidas = "SELECT * FROM medidas WHERE pessoa_id = $pessoa_id";
        $result_medidas = $conn->query($sql_medidas);

        if ($result_medidas->num_rows > 0) {
            echo "<ul>";
            while ($row_medida = $result_medidas->fetch_assoc()) {
                echo "<li>Peso: {$row_medida['peso']} kg, Altura: {$row_medida['altura']} metros</li>";
            }
            echo "</ul>";
        } else {
            echo "Nenhuma medida registrada para esta pessoa.";
        }
    }
} else {
    echo "Nenhuma pessoa cadastrada.";
}

$conn->close();
?>
