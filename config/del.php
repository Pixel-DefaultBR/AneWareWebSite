<?php
session_start();

include_once $_SERVER["DOCUMENT_ROOT"] . "/database/db.php";


if ($_SERVER["REQUEST_METHOD"] === "POST" && isset($_POST["id"])) {
    try {
        $id = $_POST["id"];

        $sql = "DELETE FROM reported_vulnerabilities WHERE id = :id";
        $stmt = $conn->prepare($sql);
        $stmt->bindParam(":id", $id, PDO::PARAM_INT);
        $stmt->execute();

        header("Location:" . $BASE_URL . "/admin/dashboard.php");
    } catch (PDOException $error) {
        header("Location:" . $BASE_URL . "/500.php");
    }


} else {
    echo "ID não fornecido.";
}

$conn = null;