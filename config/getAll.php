<?php
session_start();

include_once $_SERVER['DOCUMENT_ROOT'] . "/Blog/database/db.php";

$stmt = $conn->prepare("SELECT * FROM vulnerabilidades_reportadas");
$stmt->execute();
$items = $stmt->fetchAll();


$conn = null;

