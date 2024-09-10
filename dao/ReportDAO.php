<?php

require_once $_SERVER["DOCUMENT_ROOT"] . "/models/Report.php";
require_once $_SERVER["DOCUMENT_ROOT"] . "/models/Message.php";

class ReportDAO implements ReportDAOInterface
{

    private $conn;
    private $url;
    private $message;


    public function __construct(PDO $conn, $url)
    {
        $this->conn = $conn;
        $this->url = $url;
        $this->message = new Message($url);
    }

    public function getAllReports()
    {
        $query = "SELECT * FROM reports";
        $stmt = $this->conn->prepare($query);
        $stmt->execute();

        $data = $stmt->fetchAll(PDO::FETCH_ASSOC);
        return $data;
    }
    public function getReportById($id)
    {
        $query = "SELECT * FROM reports WHERE id = :id";
        $stmt = $this->conn->prepare($query);
        $stmt->bindParam(":id", $id);
        $stmt->execute();

        $data = $stmt->fetch();
        return $data;
    }

    public function buildReport($data)
    {
        $report = new Report();

        $report->id = $data["id"];
        $report->client = $data["client"];
        $report->researcher = $data["researcher"];
        $report->title = $data["title"];
        $report->vulnerability_type = $data["vulnerability_type"];
        $report->desciption = $data["desciption"];
        $report->severity = $data["severity"];
        $report->status = $data["status"];
        $report->image = $data["image"];

        return $report;
    }
    public function createReport(Report $report)
    {
        $query = "INSERT INTO reports (client,researcher,title,vulnerability_type,description,severity,status,image
            ) VALUES (:client,:researcher,:title,:vulnerability_type,:description, :severity, :status, :image)";
        $stmt = $this->conn->prepare($query);
        $stmt->bindParam(":client", $report->client);
        $stmt->bindParam(":researcher", $report->researcher);
        $stmt->bindParam(":title", $report->title);
        $stmt->bindParam(":vulnerability_type", $report->vulnerability_type);
        $stmt->bindParam(":description", $report->description);
        $stmt->bindParam(":severity", $report->severity);
        $stmt->bindParam(":status", $report->status);
        $stmt->bindParam(":image", $report->image);

        $stmt->execute();
    }
    public function deleteReport($id)
    {
        $query = "DELETE FROM reports WHERE id = :id";
        $stmt = $this->conn->prepare($query);
        $stmt->bindParam(":id", $id);
        $stmt->execute();
    }
    public function updateReport(Report $report)
    {
        $query = "UPDATE reports SET 
        client = :client, 
        researcher = :researcher, 
        title = :title, 
        image = :image, 
        severity = :severity, 
        status = :status, 
        description = :description, 
        vulnerability_type = :vulnerability_type
      WHERE id = :id";

        $stmt = $this->conn->prepare($query);
        $stmt->bindParam(":id", $report->id);
        $stmt->bindParam(":client", $report->client);
        $stmt->bindParam(":researcher", $report->researcher);
        $stmt->bindParam(":title", $report->title);
        $stmt->bindParam(":image", $report->image);
        $stmt->bindParam(":severity", $report->severity);
        $stmt->bindParam(":status", $report->status);
        $stmt->bindParam(":description", $report->description);
        $stmt->bindParam(":vulnerability_type", $report->vulnerability_type);
        $stmt->execute();
    }
}