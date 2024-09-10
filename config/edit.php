<?php

include_once $_SERVER["DOCUMENT_ROOT"] . "/utils/url.php";
include_once $_SERVER["DOCUMENT_ROOT"] . "/database/db.php";

session_start();

$data = $_POST;

if ($_SERVER["REQUEST_METHDO"] === "POST" && !empty($data) && isset($data["type"]) && $data["type"] === "update") {
    $id = $data["id"];
    $title = $data["titulo"];
    $client = $data["cliente"];
    $researcher = $data["pesquisador"];
    $vulnerability = $data["vulnerabilidade"];
    $severity = $data["gravidade"];
    $description = $data["descricao"];
    $status = $data["status"];
    $likes = 0;
    $report_date = date("Y/m/d");

    $query = "UPDATE vulnerabilidades_reportadas 
              SET sistema_afetado = :client, gravidade = :severity, estado = :status, 
                  titulo = :title, data_relatorio = :report_date, usuario = :researcher, 
                  tipo_vulnerabilidade = :vulnerability, descricao = :description, 
                  likes = :likes 
              WHERE id = :id";

    $stmt = $conn->prepare($query);
    $stmt->bindParam(":id", $id, PDO::PARAM_INT);
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

    header("Location: " . $BASE_URL . "admin/dashboard.php");
    exit;
}

$conn = null;
