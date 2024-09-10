<?php
require_once $_SERVER["DOCUMENT_ROOT"] . "/templates/header.php";
require_once $_SERVER["DOCUMENT_ROOT"] . "/utils/url.php";
require_once $_SERVER["DOCUMENT_ROOT"] . "/vendor/autoload.php";
require_once $_SERVER["DOCUMENT_ROOT"] . "/templates/header.php";
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

$userData = $userDAO->verifyToken(true);
$userData = $userDao->findByToken($token);

$imagePath = !empty($userData->image) ? "/img/users/{$userData->image}" : "/img/null_user.jpg";

$Parsedown = new Parsedown();
$file = $userData->markdownFile;

if ($file !== "") {
    $markdownContent = $userData->markdownFile;
}

?>

<div class="container-xl px-4 mt-4">
    <hr class="mt-0 mb-4">
    <form class="row" action="<?= $baseUrl ?>/user_process.php" method="post" enctype="multipart/form-data">
        <div class="col-xl-4">
            <!-- Profile picture card-->
            <div class="card mb-4 mb-xl-0">
                <div class="card-header">Imagem de perfil</div>
                <div class="card-body text-center">
                    <!-- Profile picture image-->
                    <img class="img-account-profile rounded-circle mb-2" style="width: 100px; border-radius: 50%;"
                        src="<?= $baseUrl . $imagePath ?>" alt="">
                    <!-- Profile picture help block-->
                    <div class="small font-italic text-muted mb-4">JPG or PNG no larger than 5 MB</div>
                    <!-- Profile picture upload button-->
                    <input type="file" class="form-control" name="image">
                </div>
            </div>
            <div class="card mb-4 mb-lg-0">
                <div class="card-body p-0">
                    <ul class="list-group list-group-flush rounded-3">
                        <li class="list-group-item d-flex justify-content-between align-items-center p-3">
                            <i class="fas fa-globe fa-lg text-warning"></i>
                            <input class="ml-0 form-control" style="width: 80%;" name="website"
                                value="<?= $userData->website ?>">
                        </li>
                        <li class="list-group-item d-flex justify-content-between align-items-center p-3">
                            <i class="fab fa-github fa-lg text-body"></i>
                            <input class="mb-0 form-control" style="width: 80%;" name="github"
                                value="<?= $userData->github ?>">
                        </li>
                        <li class="list-group-item d-flex justify-content-between align-items-center p-3">
                            <i class="fab fa-twitter fa-lg" style="color: #55acee;"></i>
                            <input class="mb-0 form-control" style="width: 80%;" name="twitter"
                                value="<?= $userData->twitter ?>">
                        </li>
                        <li class="list-group-item d-flex justify-content-between align-items-center p-3">
                            <i class="fab fa-instagram fa-lg" style="color: #ac2bac;"></i>
                            <input class="mb-0 form-control" style="width: 80%;" name="instagram"
                                value="<?= $userData->instagram ?>">
                        </li>
                        <li class="list-group-item d-flex justify-content-between align-items-center p-3">
                            <i class="fab fa-facebook-f fa-lg" style="color: #3b5998;"></i>
                            <input class="mb-0 form-control" style="width: 80%;" name="facebook"
                                value="<?= $userData->facebook ?>">
                        </li>
                    </ul>
                </div>
            </div>
        </div>
        <div class="col-xl-8">
            <!-- Account details card-->
            <div class="card mb-4">
                <div class="card-header">Detalhes da conta</div>
                <div class="card-body">
                    <!-- Form Row-->
                    <div class="row gx-3 mb-3">
                        <!-- Form Group (first name)-->
                        <div class="col-md-6">
                            <label class="small mb-1" for="inputFirstName">First name</label>
                            <input class="form-control" id="inputFirstName" type="text"
                                placeholder="<?= $userData->name ?>" name="name" value="<?= $userData->name ?>">
                        </div>
                        <!-- Form Group (last name)-->
                        <div class="col-md-6">
                            <label class="small mb-1" for="inputLastName">Last name</label>
                            <input class="form-control" id="inputLastName" type="text"
                                placeholder="<?= $userData->lastname ?>" name="lastname"
                                value="<?= $userData->lastname ?>">
                        </div>
                    </div>
                    <!-- Form Group (bio)-->
                    <div class="mb-3">
                        <label class="small mb-1" for="inputEmailAddress">README.md</label>
                        <textarea class="form-control" name="markdown" id="inputEmailAddress"
                            placeholder="Fale Sobre você"
                            style="height: 50vh; resize: none"><?= htmlspecialchars($markdownContent) ?></textarea>

                    </div>
                    <!-- Save changes button-->
                    <input type="hidden" name="type" value="update">
                    <input type="hidden" name="id" value="<?= $userData->id ?>">
                    <button class="btn btn-primary" type="submit">Save
                        changes</button>
                </div>
            </div>
        </div>
    </form>
</div>

<?php include_once $_SERVER["DOCUMENT_ROOT"] . "/templates/footer.php" ?>