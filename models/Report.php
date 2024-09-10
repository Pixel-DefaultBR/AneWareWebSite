<?php

class Report
{
    public function __construct()
    {
    }

    public $id;
    public $client;
    public $researcher;
    public $title;
    public $vulnerability_type;
    public $description;
    public $status;
    public $severity;
    public $image;



}


interface ReportDAOInterface
{
    public function buildReport($data);
    public function getAllReports();
    public function getReportById($id);
    public function createReport(Report $report);
    public function deleteReport($id);
    public function updateReport(Report $report);
}