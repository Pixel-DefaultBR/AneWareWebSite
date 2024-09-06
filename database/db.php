<?php

$host = "localhost";
$username = "";
$password = "";
$database = "";

try {
    $conn = new PDO("mysql:host=$host;dbname=$database", $username, $password);

    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch (PDOException $error) {

    echo "Erro do nosso lado x_X";

    error_log("Erro na conexão ao banco de dados:");
    return;
}

