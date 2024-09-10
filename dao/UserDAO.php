<?php
if (session_status() === PHP_SESSION_NONE) {
    session_start();
}
require_once $_SERVER["DOCUMENT_ROOT"] . "/models/User.php";
require_once $_SERVER["DOCUMENT_ROOT"] . "/models/Message.php";

class UserDAO implements UserDAOInterface
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

    public function buildUser($data)
    {
        $user = new User();

        $user->id = $data["id"];
        $user->name = $data["name"];
        $user->lastname = $data["lastname"];
        $user->email = $data["email"];
        $user->password = $data["password"];
        $user->image = $data["image"];
        $user->bio = $data["bio"];
        $user->token = $data["token"];
        $user->markdownFile = $data["markdownFile"];
        $user->website = $data["website"];
        $user->github = $data["github"];
        $user->twitter = $data["twitter"];
        $user->instagram = $data["instagram"];
        $user->facebook = $data["facebook"];
        $user->hackerone = $data["hackerone"];
        $user->bugcrowd = $data["bugcrowd"];

        return $user;
    }
    public function createUser(User $user, $authUser = false)
    {
        $query = "INSERT INTO users (name,lastname,email,password,token
            ) VALUES (:name,:lastname,:email,:password,:token)";

        $stmt = $this->conn->prepare($query);

        $stmt->bindParam(":name", $user->name);
        $stmt->bindParam(":lastname", $user->lastname);
        $stmt->bindParam(":email", $user->email);
        $stmt->bindParam(":password", $user->password);
        $stmt->bindParam(":token", $user->token);

        $stmt->execute();

        if ($authUser) {
            $this->setTokenToSession($user->token);
        }
    }
    public function updateUser(User $user, $redirect = true)
    {
        $query = "UPDATE users SET 
                    name = :name, 
                    lastname = :lastname, 
                    email = :email, 
                    image = :image, 
                    bio = :bio, 
                    token = :token, 
                    markdownFile = :markdownFile, 
                    website = :website, 
                    github = :github, 
                    twitter = :twitter, 
                    instagram = :instagram, 
                    facebook = :facebook, 
                    hackerone = :hackerone, 
                    bugcrowd = :bugcrowd 
                  WHERE id = :id";

        $stmt = $this->conn->prepare($query);

        $stmt->bindParam(":id", $user->id);
        $stmt->bindParam(":name", $user->name);
        $stmt->bindParam(":lastname", $user->lastname);
        $stmt->bindParam(":email", $user->email);
        $stmt->bindParam(":image", $user->image);
        $stmt->bindParam(":bio", $user->bio);
        $stmt->bindParam(":token", $user->token);
        $stmt->bindParam(":markdownFile", $user->markdownFile);
        $stmt->bindParam(":website", $user->website);
        $stmt->bindParam(":github", $user->github);
        $stmt->bindParam(":twitter", $user->twitter);
        $stmt->bindParam(":instagram", $user->instagram);
        $stmt->bindParam(":facebook", $user->facebook);
        $stmt->bindParam(":hackerone", $user->hackerone);
        $stmt->bindParam(":bugcrowd", $user->bugcrowd);

        $stmt->execute();

        if ($redirect) {
            $this->message->setMessage("Dados atualizados com sucesso", "success", "profile.php");
        }
    }

    public function verifyToken($protected = false)
    {
        $user = new User();

        if (!empty($_SESSION["jwt_token"])) {
            $token = $_SESSION["jwt_token"];

            $tokenIsValid = $user->validateJWTToken($token);

            if ($tokenIsValid) {
                return true;
            }

            return false;
            
        } else if ($protected) {
            $this->message->setMessage("Faca login para acessar este recurso", "error", "auth.php");
        }
    }
    public function setTokenToSession($token, $redirect = true)
    {
        $_SESSION['jwt_token'] = $token;
        header("Authorization: Bearer $token");
        $this->message->setMessage("SE TA LOGADO MANO!", "success", "editprofile.php");
    }
    public function authenticateUser($email, $password)
    {
        $user = $this->findByEmail($email);
        
        if (!$user) {
            $this->message->setMessage("Email e/ou senha incorretos", "error", "back");
        }

        if (password_verify($password, $user->password)) {
            $token = $user->generateJWTToken();
            $this->setTokenToSession($token);
            $user->token = $token;
            $this->updateUser($user, false);
            return true;
        } else {
            $this->message->setMessage("Email e/ou senha incorretos", "error", "back");
            return false;
        }
    }
    public function findByName($name)
    {
    }
    public function findByToken($token)
    {
        if (!empty($token)) {
            $query = "SELECT * FROM users WHERE token = :token";

            $stmt = $this->conn->prepare($query);
            $stmt->bindParam(":token", $token);
            $stmt->execute();

            if ($stmt->rowCount() > 0) {
                $data = $stmt->fetch();
                $user = $this->buildUser($data);

                return $user;
            }
        }
    }
    public function findByEmail($email)
    {
        if (!empty($email) || $email !== "") {
            $query = "SELECT * FROM users WHERE email = :email";

            $stmt = $this->conn->prepare($query);
            $stmt->bindParam(":email", $email);
            $stmt->execute();

            if ($stmt->rowCount() > 0) {
                $data = $stmt->fetch();
                $user = $this->buildUser($data);

                return $user;
            }
        }


        return false;
    }
    public function findById($id)
    {
        if (!empty($id) || $id !== "") {
            $query = "SELECT * FROM users WHERE id = :id";

            $stmt = $this->conn->prepare($query);
            $stmt->bindParam(":id", $id);
            $stmt->execute();

            if ($stmt->rowCount() > 0) {
                $data = $stmt->fetch();
                $user = $this->buildUser($data);

                return $user;
            }
        }

        return false;
    }
    public function changePassword(User $user)
    {
    }

    public function destroyToken()
    {
        $_SESSION["jwt_token"] = "";

        $this->message->setMessage("Volte logo", "success");
    }
}