<?php

include_once $_SERVER["DOCUMENT_ROOT"] . "/database/db.php";

try {
    $stmt = $conn->prepare("SELECT * FROM reported_vulnerabilities");
    $stmt->execute();
    $items = $stmt->fetchAll();
    
    $conn = null;
} catch (PDOException $error) {
    $items = [];
    return $items;
}


