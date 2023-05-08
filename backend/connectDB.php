<?php

// Campos necessários
$host = "localhost";
$utilizador = "root";
$password = "";
$db = "filmes";

$mysqli = new mysqli($host, $utilizador, $password, $db);
 
// Verificar conexão
if ($mysqli->connect_errno) {
    die("Erro de conexão: " . $mysqli->connect_error);
}

return $mysqli;
?>