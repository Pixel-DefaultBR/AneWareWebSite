<?php

include_once $_SERVER['DOCUMENT_ROOT'] . "/Blog/database/db.php";

if (!empty($_GET)) {
    $id = $_GET["id"];
}

if (!empty($_GET)) {
    $query = "SELECT * FROM vulnerabilidades_reportadas WHERE id = :id";
    $stmt = $conn->prepare($query);
    $stmt->bindParam(":id", $id, PDO::PARAM_INT);
    $stmt->execute();
    $items = $stmt->fetch();

} else {
    $stmt = $conn->prepare("SELECT * FROM vulnerabilidades_reportadas");
    $stmt->execute();
    $items = $stmt->fetchAll();
}

$conn = null;