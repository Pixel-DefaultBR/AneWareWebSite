<?php
session_start();

include_once $_SERVER['DOCUMENT_ROOT'] . "/Blog/database/db.php";

//Delete Data
if ($_SERVER["REQUEST_METHOD"] === "POST" && isset($_POST["id"])) {
    $id = $_POST['id'];

    $sql = "DELETE FROM vulnerabilidades_reportadas WHERE id = :id";

    // 4. Preparar e executar a query usando uma declaração preparada
    $stmt = $conn->prepare($sql);
    $stmt->bindParam(':id', $id, PDO::PARAM_INT);

    $stmt->execute();

    header("Location:" . $BASE_URL . "/Blog/admin/dashboard.php");

} else {
    echo "ID não fornecido.";
}

$conn = null;