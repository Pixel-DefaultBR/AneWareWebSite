<?php

include_once $_SERVER["DOCUMENT_ROOT"] . "/database/db.php";

try {
    if (!empty($_GET)) {
        $id = $_GET["id"];
    }

    if (!empty($_GET)) {
        $query = "SELECT * FROM reported_vulnerabilities WHERE id = :id";
        $stmt = $conn->prepare($query);
        $stmt->bindParam(":id", $id, PDO::PARAM_INT);
        $stmt->execute();
        $items = $stmt->fetch();

    } else {
        $items = [];
        return $items;
    }

    $conn = null;
} catch (PDOException $error) {
    $items = [];
    return $items;
}

