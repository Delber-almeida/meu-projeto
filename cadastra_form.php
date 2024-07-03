<?php
include 'conecta.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $nome = $_POST['nome'];
    $email = $_POST['email'];
    $avaliacao = $_POST['avaliacao'];
    $episodio = $_POST['episodio'];
    $comentarios = $_POST['comentarios'];
    $personagem = $_POST['personagem'];
    $gostaram = $_POST['gostaram'];

    $sql = "INSERT INTO formulario (nome, email, avaliacao, episodio, comentarios, personagem, gostaram) 
            VALUES ('$nome', '$email', '$avaliacao', '$episodio', '$comentarios', '$personagem', '$gostaram')";

    if ($conn->query($sql) === TRUE) {
        echo "Dados inseridos com sucesso!";
    } else {
        echo "Erro: " . $sql . "<br>" . $conn->error;
    }

    $conn->close();
}
?>
