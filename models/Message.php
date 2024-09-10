<?php
if (session_status() === PHP_SESSION_NONE) {
    session_start();
}
class Message
{
    private $url;
    public function __construct($url)
    {
        $this->url = $url;
    }

    public function setMessage($message, $type, $redirect = "index.php")
    {
        $_SESSION["msg"] = $message;
        $_SESSION["type"] = $type;

        if ($redirect != "back") {
            header("Location: $this->url/" . $redirect);
            return;
        }

        header("Location:" . $_SERVER["HTTP_REFERER"]);
    }

    public function getMessage()
    {
        if (!empty($_SESSION["msg"])) {
            return ["msg" => $_SESSION["msg"], "type" => $_SESSION["type"]];
        }

        return [];
    }

    public function clearMessage()
    {
        $_SESSION["msg"] = "";
        $_SESSION["type"] = "";
    }
}