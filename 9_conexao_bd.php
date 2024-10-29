<?php

$servername = "localhost";
$username = "root";
$password = "";
$dbname = "exercicio";

try {
    // tenta criar uma conexao com o banco de dados
    $conn = new mysqli($servername, $username, $password, $dbname);

    // verifica de houve alguem erro na conexao
    if ($conn->connect_error) {
        throw new Exception("falha na conecxao: " . $conn->connrc_error);
    }

    echo "conexao realizada com sucesso";
} catch (Exception $e) {
    // exibe uma mensagem de erro amigavel
    echo "erro ao conectar ao bando de dados: " . $e->getMessage();
}

?>

<!-- Para criar o BD -->
<!-- CREATE DATABASE exercicio; -->

<!-- Para criar a Tabela -->
<!-- CREATE TABLE clientes (
    id INT AUTO_INCREMENT PRIMARY KEY,
    nome VARCHAR(100) NOT NULL,
    email VARCHAR(100) NOT NULL 
); -->


