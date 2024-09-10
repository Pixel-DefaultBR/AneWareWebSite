<?php
if (session_status() === PHP_SESSION_NONE) {
    session_start();
}
require_once $_SERVER["DOCUMENT_ROOT"] . "/database/db.php";
require_once $_SERVER["DOCUMENT_ROOT"] . "/models/User.php";
require_once $_SERVER["DOCUMENT_ROOT"] . "/models/Message.php";
require_once $_SERVER["DOCUMENT_ROOT"] . "/dao/UserDAO.php";
require_once $_SERVER["DOCUMENT_ROOT"] . "/global/global.php";



class AuthProcess
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
        $this->global = new GlobalUtil();
        $this->conn = $this->database->conn;
        $this->baseUrl = $this->global->getBaseUrl();
        $this->message = new Message($this->baseUrl);
        $this->userDAO = new UserDAO($this->conn, $this->baseUrl);
        $this->user = new User();
    }

    public function processAuth()
    {
        $type = filter_input(INPUT_POST, "type");
        if ($type == "register") {
            $this->register();
        } else if ($type == "login") {
            $this->login();
        } else {

            $this->message->setMessage("Informacoes invalidas", "error", "index.php");
        }
    }


    public function register()
    {
        $name = filter_input(INPUT_POST, "name");
        $lastName = filter_input(INPUT_POST, "lastname");
        $email = filter_input(INPUT_POST, "email");
        $password = filter_input(INPUT_POST, "password");
        $confirmPassword = filter_input(INPUT_POST, "confirm-password");
        $auth = true;

        if ($this->userDAO->findByName($name)) {
            $this->message->setMessage("Usuario JA EXISTE MUDA AE", "error", "back");
        }

        if (!$this->userDAO->findByEmail($email)) {
            $userAccessToken = $this->user->generateJWTToken();
            $hashedPassword = $this->user->generateHashedPassword($password);

            $this->user->name = $name;
            $this->user->lastname = $lastName;
            $this->user->email = $email;
            $this->user->password = $hashedPassword;
            $this->user->token = $userAccessToken;

            $this->userDAO->createUser($this->user, $auth);
        } else {
            $this->message->setMessage("EMAIL JA TA SENDO USADO!", "error", "back");
        }

        if (empty($name || $email || $password)) {
            $this->message->setMessage("TA FALTANDO ALI MANO!", "error", "back");
        }

        if ($password != $confirmPassword) {
            $this->message->setMessage("As senhas ali tao diferente!!!", "error", "back");
        }

    }

    public function login()
    {
        $email = filter_input(INPUT_POST, "email");
        $password = filter_input(INPUT_POST, "password");

        if ($this->userDAO->authenticateUser($email, $password)) {
            $this->message->setMessage("Seja bem vindo", "error", "index.php");
        }
    }
}

$authProcess = new AuthProcess();
$authProcess->processAuth();






