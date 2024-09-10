<?php

require_once $_SERVER["DOCUMENT_ROOT"] . "/global/global.php";
require_once $_SERVER["DOCUMENT_ROOT"] . "/database/db.php";
require_once $_SERVER["DOCUMENT_ROOT"] . "/dao/ReportDAO.php";
require_once $_SERVER["DOCUMENT_ROOT"] . "/global/global.php";
require_once $_SERVER["DOCUMENT_ROOT"] . "/utils/sanitizer.php";
require_once $_SERVER["DOCUMENT_ROOT"] . "/models/Message.php";
require_once $_SERVER["DOCUMENT_ROOT"] . "/dao/UserDAO.php";
require_once $_SERVER["DOCUMENT_ROOT"] . "/database/db.php";

$database = new Database();
$conn = $database->conn;

$globalUtils = new GlobalUtil();
$baseUrl = $globalUtils->getBaseUrl();

$message = new Message($baseUrl);
$flassMessage = $message->getMessage();
$token = '';

if (!empty($flassMessage["msg"])) {
    $message->clearMessage();
}

$userDao = new UserDao($conn, $baseUrl);

if (!empty($_SESSION['jwt_token'])) {
    $token = $_SESSION['jwt_token'];
}

$userData = $userDao->findByToken($token);
$isAuthenticad = $userDao->verifyToken(false);

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="<?= $baseUrl ?>/css/style.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM"
        crossorigin="anonymous"></script>

    <link
        href="https://fonts.googleapis.com/css2?family=Poppins:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900&display=swap"
        rel="stylesheet">

    <title>AneWare Security</title>
</head>
<header>
    <?php if (!$isAuthenticad): ?>
        <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
            <div class="container-fluid">
                <a class="navbar-brand" href="/"><img class="logo" style="width: 60px;"
                        src="<?= $baseUrl ?>/img/aneware_logo.png"></a>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarColor01"
                    aria-controls="navbarColor01" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse" id="navbarColor01">
                    <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                        <li class="nav-item">
                            <a class="nav-link active" aria-current="page" href="#">Sobre nós</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="#">Códigos</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="<?= $baseUrl ?>/view/reports.php">Portifólio</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="#">Fale conosco</a>
                        </li>
                    </ul>
                    <form class="d-flex">
                        <input class="form-control me-2" type="search" placeholder="Search" aria-label="Search">
                        <button class="btn btn-outline-light" type="submit">Search</button>
                    </form>
                    <ul class="navbar-nav">
                        <li class="nav-item">
                            <a class="nav-link" href="<?= $baseUrl ?>/auth.php">Login</a>
                        </li>
                    </ul>
                </div>
            </div>
        </nav>
    <?php else: ?>
        <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
            <div class="container-fluid">
                <a class="navbar-brand" href="/"><img class="logo" style="width: 60px;"
                        src="<?= $baseUrl ?>/img/aneware_logo.png"></a>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarColor01"
                    aria-controls="navbarColor01" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse" id="navbarColor01">
                    <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                        <li class="nav-item">
                            <a class="nav-link active" aria-current="page" href="#">Sobre nós</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="#">Códigos</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="<?= $baseUrl ?>/view/reports.php">Portifólio</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="#">Fale conosco</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="<?= $baseUrl ?>/admin/dashboard.php">Dashboard</a>
                        </li>
                    </ul>
                    <form class="d-flex">
                        <input class="form-control me-2" type="search" placeholder="Search" aria-label="Search">
                        <button class="btn btn-outline-light" type="submit">Search</button>
                    </form>
                    <ul class="navbar-nav">
                        <li class="nav-item">
                            <a class="nav-link active" aria-current="page" href="<?= $baseUrl ?>/profile.php">Olá,
                                <?= $userData->name ?></a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="<?= $baseUrl ?>/logout.php">Sair</a>
                        </li>
                    </ul>
                </div>
            </div>
        </nav>
    <?php endif ?>
    <?php if (!empty($flassMessage["msg"])): ?>
        <div class="alert alert-primary" role="alert">
            <p class="msg <?= $flassMessage["type"] ?>"> <?= $flassMessage["msg"] ?></p>
        </div>
    <?php endif ?>
</header>

<body>
    <div class="app">