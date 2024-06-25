<?php
include 'conecta.php';
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $nome = $_POST['nome'];
    $sobrenome = $_POST['sobrenome'];
    $idade = $_POST['idade'];
    $pesos = $_POST['peso'];
    $alturas = $_POST['altura'];


    $sql = "INSERT INTO pessoas (nome, sobrenome, idade) VALUES ('$nome', '$sobrenome', $idade)";



    if ($conn->query($sql) === TRUE) {
        $pessoa_id = $conn->insert_id;




        foreach ($pesos as $key => $peso) {
            $altura = $alturas[$key];
            $sql_peso_altura = "INSERT INTO medidas (pessoa_id, peso, altura) VALUES ($pessoa_id, $peso, $altura)";
            $conn->query($sql_peso_altura);
        }

        echo "Pessoa cadastrada com sucesso!";
    } else {
        echo "Erro ao cadastrar pessoa: " . $conn->error;
    }




    $conn->close();
}
?>
