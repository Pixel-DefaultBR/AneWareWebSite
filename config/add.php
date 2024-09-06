<?php
session_start();

include_once $_SERVER['DOCUMENT_ROOT'] . "/Blog/database/db.php";

$data = $_POST;

if (!empty($data)) {
    if ($data["type"] === "create") {
        $title = $data["titulo"];
        $client = $data["cliente"];
        $researcher = $data["pesquisador"];
        $vulnerability = $data["vulnerabilidade"];
        $severity = $data["gravidade"];
        $description = $data["descricao"];
        $status = $data["status"];
        $likes = 0;
        $report_date = date("Y/m/d");

        $query = "INSERT INTO vulnerabilidades_reportadas (sistema_afetado, gravidade, estado, titulo, data_relatorio, usuario, tipo_vulnerabilidade, descricao, likes) VALUES (:client, :severity, :status, :title, :report_date, :researcher ,:vulnerability, :description, :likes)";
        $stmt = $conn->prepare($query);
        $stmt->bindParam(":title", $title);
        $stmt->bindParam(":client", $client);
        $stmt->bindParam(":researcher", $researcher);
        $stmt->bindParam(":vulnerability", $vulnerability);
        $stmt->bindParam(":severity", $severity);
        $stmt->bindParam(":description", $description);
        $stmt->bindParam(":status", $status);
        $stmt->bindParam(":likes", $likes);
        $stmt->bindParam(":report_date", $report_date);
        $stmt->execute();
    }

    header("Location:" . $BASE_URL . "/Blog/admin/dashboard.php");
}

$conn = null;


