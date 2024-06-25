<?php
include 'conecta.php';
if (isset($_GET['id'])) {
    $pessoa_id = $_GET['id'];

   
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        $nome = $_POST['nome'];
        $sobrenome = $_POST['sobrenome'];
        $idade = $_POST['idade'];

   
        $sql = "UPDATE pessoas SET nome='$nome', sobrenome='$sobrenome', idade=$idade WHERE id=$pessoa_id";

   
        if ($conn->query($sql) === TRUE) {
            echo "Dados atualizados com sucesso!";
        } else {
            echo "Erro ao atualizar dados: " . $conn->error;
        }


        header("Location: visualiza_pessoas.php");
        exit();
    }

    
    $sql_select = "SELECT * FROM pessoas WHERE id=$pessoa_id";
    $result_select = $conn->query($sql_select);

    if ($result_select->num_rows > 0) {
        $row = $result_select->fetch_assoc();
        $nome = $row['nome'];
        $sobrenome = $row['sobrenome'];
        $idade = $row['idade'];
    } else {
        echo "Pessoa não encontrada.";
        exit();
    }
} else {
    echo "ID da pessoa não fornecido.";
    exit();
}

$conn->close();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Atualizar Pessoa</title>
    <link rel="stylesheet" href="formulario.css">
</head>
<body>
    <div class="form-container">
        <h2>Atualizar Pessoa</h2>
        <form action="atualiza_pessoa.php?id=<?php echo $pessoa_id; ?>" method="post">
            <div class="form-group">
                <label for="nome">Nome:</label>
                <input type="text" id="nome" name="nome" value="<?php echo $nome; ?>" required>
            </div>
            <div class="form-group">
                <label for="sobrenome">Sobrenome:</label>
                <input type="text" id="sobrenome" name="sobrenome" value="<?php echo $sobrenome; ?>" required>
            </div>
            <div class="form-group">
                <label for="idade">Idade:</label>
                <input type="number" id="idade" name="idade" value="<?php echo $idade; ?>" required>
            </div>
            <div class="form-group">
                <input type="submit" value="Atualizar Pessoa">
            </div>
        </form>
    </div>
</body>
</html>
