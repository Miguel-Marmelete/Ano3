<?php
$servername = "localhost";  // Endereço do servidor MySQL (normalmente localhost)
$username = "root";  // Nome de usuário do MySQL
$password = "";    // Senha do MySQL
$dbname = "school"; // Nome do banco de dados

// Criando a conexão
$conn = new mysqli($servername, $username, $password, $dbname);

// Verificando a conexão
if ($conn->connect_error) {
    die("Erro na conexão: " . $conn->connect_error);
}

echo "Conexão bem-sucedida";
?>
