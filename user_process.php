<?php

if (session_status() === PHP_SESSION_NONE) {
    session_start();
}

require_once $_SERVER["DOCUMENT_ROOT"] . "/database/db.php";
require_once $_SERVER["DOCUMENT_ROOT"] . "/models/User.php";
require_once $_SERVER["DOCUMENT_ROOT"] . "/models/Message.php";
require_once $_SERVER["DOCUMENT_ROOT"] . "/dao/UserDAO.php";
require_once $_SERVER["DOCUMENT_ROOT"] . "/global/global.php";

class UserUpdateProcess
{
    private $database;
    private $conn;
    private $global;
    private $baseUrl;
    private $message;
    private $userDAO;
    private $user;

    public function __construct()
    {
        $this->database = new Database();
        $this->conn = $this->database->conn;
        $this->global = new GlobalUtil();
        $this->baseUrl = $this->global->getBaseUrl();
        $this->message = new Message($this->baseUrl);
        $this->userDAO = new UserDAO($this->conn, $this->baseUrl);
        $this->user = new User();
    }

    public function updateUser()
    {
        $type = filter_input(INPUT_POST, "type");

        if ($type == "update") {
            $id = filter_input(INPUT_POST, "id");
            $name = filter_input(INPUT_POST, "name");
            $lastname = filter_input(INPUT_POST, "lastname");
            $bio = filter_input(INPUT_POST, "bio");
            $email = filter_input(INPUT_POST, "email");
            $password = filter_input(INPUT_POST, "password");
            $confirmPassword = filter_input(INPUT_POST, "confirm-password");
            $markdown = filter_input(INPUT_POST, "markdown");
            $website = filter_input(INPUT_POST, "website");
            $github = filter_input(INPUT_POST, "github");
            $twitter = filter_input(INPUT_POST, "twitter");
            $instagram = filter_input(INPUT_POST, "instagram");
            $facebook = filter_input(INPUT_POST, "facebook");

            $userData = $this->userDAO->findById($id);

            if ($userData) {
                $userData->name = $name;
                $userData->lastname = $lastname;
                $userData->bio = $bio;
                $userData->markdownFile = $markdown;
                $userData->website = $website;
                $userData->github = $github;
                $userData->twitter = $twitter;
                $userData->instagram = $instagram;
                $userData->facebook = $facebook;

                if (isset($_FILES["image"]) && !empty($_FILES["image"]["tmp_name"])) {
                    $this->handleImageUpload($userData);
                }

                $this->userDAO->updateUser($userData, true);
                $this->message->setMessage("Atualização concluída com sucesso", "success", "profile.php");
            } else {
                $this->message->setMessage("Usuário não encontrado", "error", "index.php");
            }
        } else {
            $this->message->setMessage("Tipo inválido", "error", "index.php");
        }
    }

    private function handleImageUpload($userData)
    {
        $image = $_FILES["image"];
        $imageTypes = ["image/jpg", "image/jpeg", "image/png"];
        $imageJPG = ["image/jpg", "image/jpeg"];

        if (!in_array($image["type"], $imageTypes)) {
            $this->message->setMessage("Imagem inválida", "error", "back");
            return;
        }

        if (in_array($image["type"], $imageJPG)) {
            $imageFile = imagecreatefromjpeg($image["tmp_name"]);
        } else {
            $imageFile = imagecreatefrompng($image["tmp_name"]);
        }

        $imageName = $this->user->imageGenerateName();
        imagejpeg($imageFile, $_SERVER["DOCUMENT_ROOT"] . "/img/users/" . $imageName, 100);

        $userData->image = $imageName;
    }
}

$userUpdateProcess = new UserUpdateProcess();
$userUpdateProcess->updateUser();
