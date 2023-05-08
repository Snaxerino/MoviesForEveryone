<?php

// Se o campo estiver vazio mostra esta mensagem
if (empty($_POST["nome"])) {
    die("É necessário colocar um nome");
}

// Se o campo estiver vazio mostra esta mensagem
if (empty($_POST["email"])) {
    die("É necessário colocar um email");
}

// Se não for um email válido mostra esta mensagem
if ( ! filter_var($_POST["email"], FILTER_VALIDATE_EMAIL)) {
    die("É necessário colocar um email válido");
}

// Se a psw não tiver pelo menos 8 caracteres mostra esta mensagem
if (strlen($_POST["password"]) < 8) {
    die("A password deve ter pelo menos 8 caracteres");
}

// Se a psw não tiver pelo menos 1 letra mostra esta mensagem
if (! preg_match("/[a-z]/i", $_POST["password"])) {
    die("A password deve ter pelo menos uma letra");
}

// Se a psw não tiver pelo menos 1 número mostra esta mensagem
if (! preg_match("/[0-9]/i", $_POST["password"])) {
    die("A password deve ter pelo menos um número");
}

// Se a psw não estiver igual à psw de confirmação mostra esta mensagem
if ($_POST["password"] !== $_POST["password2"]) {
    die("As passwords não coincidem");
}

// Função que "encripta a password para ser guardada na BD"
$psw = password_hash($_POST["password"], PASSWORD_DEFAULT);

$mysqli = require __DIR__ . "/connectDB.php";

$sql = "INSERT INTO utilizador (nome, email, psw)
        VALUES (?, ?, ?)";

// Prepared statement
$stmt = $mysqli->stmt_init();

if ( ! $stmt->prepare($sql)) {
    die("Erro SQL: " . $mysqli->error);
}

$stmt->bind_param("sss",
                  $_POST["nome"],
                  $_POST["email"],
                  $psw);

if ($stmt->execute()) {
    header("Location: ../frontend/signupSucesso.php");
    exit;
} else {
    if ($mysqli->errno === 1062) { // 1062 Pois é o erro específico quando existem emails repetidos
        die("O Email já existe");
    } else {
        die($mysqli->error . " " . $mysqli->errno);
    }
}

print_r($_POST);
var_dump($psw);