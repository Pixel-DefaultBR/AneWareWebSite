<?php
include_once $_SERVER["DOCUMENT_ROOT"] . "/templates/header.php";
require_once $_SERVER["DOCUMENT_ROOT"] . "/global/global.php";
require_once $_SERVER["DOCUMENT_ROOT"] . "/database/db.php";
require_once $_SERVER["DOCUMENT_ROOT"] . "/dao/ReportDAO.php";
require_once $_SERVER["DOCUMENT_ROOT"] . "/global/global.php";
require_once $_SERVER["DOCUMENT_ROOT"] . "/utils/sanitizer.php";
require_once $_SERVER["DOCUMENT_ROOT"] . "/models/Message.php";
require_once $_SERVER["DOCUMENT_ROOT"] . "/dao/UserDAO.php";
require_once $_SERVER["DOCUMENT_ROOT"] . "/database/db.php";

require $_SERVER["DOCUMENT_ROOT"] . "/vendor/autoload.php";

$database = new Database();
$conn = $database->conn;

$globalUtils = new GlobalUtil();
$baseUrl = $globalUtils->getBaseUrl();

$userDAO = new UserDAO($conn, $baseUrl);

$userData = $userDAO->verifyToken(true);
$userData = $userDAO->findByToken($token);


$imagePath = !empty($userData->image) ? "/img/users/{$userData->image}" : "/img/null_user.jpg";

$Parsedown = new Parsedown();
$file = $userData->markdownFile;
if ($file !== "") {
    $markdownContent = $file;
    $htmlContent = $Parsedown->text($markdownContent);
}

function displayValue($value)
{
    return empty($value) ? '---' : htmlspecialchars($value);
}

?>

<div class="container-xl px-4 mt-4">
    <hr class="mt-0 mb-4">
    <div class="row">
        <div class="col-lg-4">
            <div class="card mb-4">
                <div class="card-body text-center">
                    <img src="<?= $baseUrl . $imagePath ?>" class="rounded-circle mb-2" alt="User Image" style="width: 100px">
                    <h5 class="my-3"><?= $userData->name ?></h5>
                    <p class="text-muted mb-1"></p>
                    <div class="d-flex justify-content-center mb-2">
                        <a href="<?= $baseUrl ?>/editprofile.php" type="button" data-mdb-button-init
                            data-mdb-ripple-init class="btn btn-primary">Editar</a>
                    </div>
                </div>
            </div>
            <div class="card mb-4 mb-lg-0">
                <div class="card-body p-0">
                    <ul class="list-group list-group-flush rounded-3">
                        <li class="list-group-item d-flex justify-content-between align-items-center p-3">
                            <i class="fas fa-globe fa-lg text-warning"></i>
                            <p class="mb-0"><?= displayValue($userData->website); ?></p>
                        </li>
                        <li class="list-group-item d-flex justify-content-between align-items-center p-3">
                            <i class="fab fa-github fa-lg text-body"></i>
                            <p class="mb-0"><?= displayValue($userData->github); ?></p>
                        </li>
                        <li class="list-group-item d-flex justify-content-between align-items-center p-3">
                            <i class="fab fa-twitter fa-lg" style="color: #55acee;"></i>
                            <p class="mb-0"><?= displayValue($userData->twitter); ?></p>
                        </li>
                        <li class="list-group-item d-flex justify-content-between align-items-center p-3">
                            <i class="fab fa-instagram fa-lg" style="color: #ac2bac;"></i>
                            <p class="mb-0"><?= displayValue($userData->instagram); ?></p>
                        </li>
                        <li class="list-group-item d-flex justify-content-between align-items-center p-3">
                            <i class="fab fa-facebook-f fa-lg" style="color: #3b5998;"></i>
                            <p class="mb-0"><?= displayValue($userData->facebook); ?></p>
                        </li>
                    </ul>
                </div>
            </div>
        </div>

        <div class="col-lg-8">
            <div class="card mb-4">
                <div class="card-header">README</div>
                <div class="card-body" style="height: 100vh; overflow: auto;">
                    <div class="column">
                        <div class="col-sm-9 bio-container">
                            <p class="text-muted mb-0" style="overflow: hidden;"><?= $htmlContent ?></p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>


<?php include_once $_SERVER["DOCUMENT_ROOT"] . "/templates/footer.php" ?>