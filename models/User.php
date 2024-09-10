<?php
if (session_status() === PHP_SESSION_NONE) {
    session_start();
}

require_once $_SERVER["DOCUMENT_ROOT"] . "/vendor/autoload.php";

use \Firebase\JWT\JWT;
use \Firebase\JWT\ExpiredException;
use Firebase\JWT\Key;

class User
{
    public $id;
    public $name;
    public $lastname;
    public $email;
    public $password;
    public $image;
    public $markdownFile;
    public $website;
    public $github;
    public $twitter;
    public $instagram;
    public $facebook;
    public $hackerone;
    public $bugcrowd;
    public $bio;
    public $token;

    private $secretKey;

    public function __construct()
    {
        $this->secretKey = "PIXELdEf123321";
    }

    public function generateJWTToken()
    {

        $userData = ["id" => $this->id, "username" => $this->name];

        $payload = [
            'iat' => time(),
            'exp' => time() + 3600,
            'data' => $userData
        ];

        $jwt = JWT::encode($payload, $this->secretKey, "HS256");

        return $jwt;
    }
    public function generateHashedPassword($password)
    {
        return password_hash($password, PASSWORD_DEFAULT);
    }

    public function validateJWTToken($token)
    {
        try {

            JWT::decode($token, new key($this->secretKey, 'HS256'));
            return true;

        } catch (ExpiredException $e) {
            return false;

        } catch (\UnexpectedValueException $e) {
            return false;

        } catch (\Exception $e) {
            return false;
        }
    }
    public function imageGenerateName()
    {
        return bin2hex(random_bytes(50)) . ".jpg";
    }
}

interface UserDAOInterface
{
    public function buildUser($data);
    public function createUser(User $user, $authUser = false);
    public function updateUser(User $user, $redirect = true);
    public function verifyToken($protected = false);
    public function setTokenToSession($token, $redirect = true);
    public function authenticateUser($email, $password);
    public function findByName($name);
    public function findByToken($token);
    public function findByEmail($email);
    public function findById($id);
    public function changePassword(User $user);
    public function destroyToken();

}