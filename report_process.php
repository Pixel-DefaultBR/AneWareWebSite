<?php

require_once $_SERVER["DOCUMENT_ROOT"] . "/database/db.php";
require_once $_SERVER["DOCUMENT_ROOT"] . "/global/global.php";
require_once $_SERVER["DOCUMENT_ROOT"] . "/models/User.php";
require_once $_SERVER["DOCUMENT_ROOT"] . "/models/Message.php";
require_once $_SERVER["DOCUMENT_ROOT"] . "/dao/ReportDAO.php";

class ReportProcess
{
    private $conn;
    private $message;
    private $url;
    private $reportDao;
    private $type;
    private $idGet;
    private $idPost;
    private $client;
    private $researcher;
    private $title;
    private $vulnerability_type;
    private $description;
    private $severity;
    private $status;
    private $image;
    private $report;
    private $baseUrl;
    public function __construct()
    {
        $database = new Database();
        $this->conn = $database->conn;

        $this->baseUrl = new GlobalUtil();
        $this->message = new Message($this->baseUrl->getBaseUrl());

        $this->reportDao = new ReportDAO($this->conn, $this->url);
        $this->report = new Report();
        $this->type = filter_input(INPUT_POST, "type");
        $this->idGet = filter_input(INPUT_GET, "id");
        $this->idPost = filter_input(INPUT_POST, "id");
        $this->client = filter_input(INPUT_POST, "client");
        $this->researcher = filter_input(INPUT_POST, "researcher");
        $this->title = filter_input(INPUT_POST, "title");
        $this->vulnerability_type = filter_input(INPUT_POST, "vulnerability_type");
        $this->description = filter_input(INPUT_POST, "description");
        $this->severity = filter_input(INPUT_POST, "severity");
        $this->status = filter_input(INPUT_POST, "status");
        $this->image = filter_input(INPUT_POST, "image");
    }

    public function getAllReports()
    {
        if ($_SERVER["REQUEST_METHOD"] === "GET" && !isset($_GET["id"])) {
            $data = $this->reportDao->getAllReports();

            if (!$data) {
                return false;
            }

            return $data;
        } else {
            return false;
        }
    }

    public function getById()
    {
        if ($_SERVER["REQUEST_METHOD"] === "GET" && isset($_GET["id"])) {
            $data = $this->reportDao->getReportById($this->idGet);

            if (!$data) {
                return false;
            }

            return $data;
        } else {
            return false;
        }
    }
    public function create()
    {
        if ($this->type === "create") {
            try {
                $this->report->client = $this->client;
                $this->report->researcher = $this->researcher;
                $this->report->title = $this->title;
                $this->report->vulnerability_type = $this->vulnerability_type;
                $this->report->description = $this->description;
                $this->report->severity = $this->severity;
                $this->report->status = $this->status;
                $this->report->image = $this->image;

                $this->reportDao->createReport($this->report);
                $this->message->setMessage("Relatorio criado com sucesso.", "success", "/admin/dashboard.php");
                return;
            } catch (Exception $e) {
                $this->message->setMessage("Erro ao criar relatorio.", "error", "back");
            }
        }
    }

    public function update()
    {
        if ($this->type === "update") {
            try {
                $this->report->id = $this->idPost;
                $this->report->client = $this->client;
                $this->report->researcher = $this->researcher;
                $this->report->title = $this->title;
                $this->report->vulnerability_type = $this->vulnerability_type;
                $this->report->description = $this->description;
                $this->report->status = $this->status;
                $this->report->severity = $this->severity;
                $this->report->image = $this->image;

                $this->reportDao->updateReport($this->report);

                $this->message->setMessage("Relatorio editado com sucesso.", "success", "/admin/dashboard.php");
                return;
            } catch (Exception $e) {
                $this->message->setMessage("Erro ao editado relatorio.", "error", "back");
            }

        }
    }

    public function delete()
    {
        if ($this->type == "delete") {
            try {
                $this->reportDao->deleteReport($this->idPost);

                $this->message->setMessage("Relatorio deletado com sucesso.", "success", "/admin/dashboard.php");
                return;
            } catch (Exception $e) {
                $this->message->setMessage("Erro ao deletar relatorio.", "error", "back");
            }
        }
    }
}


$reportController = new ReportProcess();

$reportController->getAllReports();
$reportController->create();
$reportController->update();
$reportController->delete();

$conn = null;