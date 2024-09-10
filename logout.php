<?php
require_once $_SERVER["DOCUMENT_ROOT"] . "/global/global.php";
require_once $_SERVER["DOCUMENT_ROOT"] . "/database/db.php";
require_once $_SERVER["DOCUMENT_ROOT"] . "/dao/UserDAO.php";


$database = new Database();
$conn = $database->conn;

$globalUtils = new GlobalUtil();
$baseUrl = $globalUtils->getBaseUrl();

$userDAO = new UserDAO($conn, $baseUrl);

if ($userDAO) {
    $userDAO->destroyToken();
}