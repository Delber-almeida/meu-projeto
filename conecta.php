<?php
$servername = "localhost";
$username = "root";
$password = ""; // Normalmente o password padrão é vazio
$dbname = "banco_form";

// Criar a conexão
$conn = new mysqli($servername, $username, $password, $dbname);

// Verificar a conexão
if ($conn->connect_error) {
    die("Conexão falhou: " . $conn->connect_error);
}
?>
