<?php
session_start();

include_once $_SERVER["DOCUMENT_ROOT"] . "/database/db.php";

$data = $_POST;

if ($_SERVER["REQUEST_METHOD"] === "POST" && !empty($data) && isset($data['type']) && $data["type"] === "create") {
    try {
        $title = $data["title"];
        $client = $data["affected_system"];
        $researcher = $data["user"];
        $vulnerability = $data["vulnerability_type"];
        $severity = $data["severity"];
        $description = $data["description"];
        $status = $data["status"];
        $likes = 0;
        $report_date = date("Y/m/d");

        $query = "INSERT INTO reported_vulnerabilities (affected_system, status, severity, title, report_date, user, vulnerability_type, description, likes) VALUES (:affected_system, :severity, :status, :title, :report_date, :user ,:vulnerability_type, :description, :likes)";
        $stmt = $conn->prepare($query);
        $stmt->bindParam(":title", $title);
        $stmt->bindParam(":affected_system", $client);
        $stmt->bindParam(":user", $researcher);
        $stmt->bindParam(":vulnerability_type", $vulnerability);
        $stmt->bindParam(":severity", $severity);
        $stmt->bindParam(":description", $description);
        $stmt->bindParam(":status", $status);
        $stmt->bindParam(":likes", $likes);
        $stmt->bindParam(":report_date", $report_date);
        $stmt->execute();

        header("Location:" . $BASE_URL . "/admin/dashboard.php");
    } catch (PDOException $error) {
        header("Location:" . $BASE_URL . "/500.php");
        exit;
    }

}

$conn = null;


