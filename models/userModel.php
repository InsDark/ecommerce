<?php 
if($_SERVER['REQUEST_METHOD'] == 'POST') {
    require_once './../config/parameters.php';
    require_once './../config/db.php';
    $action = $_GET['action'];
    $user = new User();
    $user->$action();
}
if(!isset($_SESSION)) {session_start();}

class User {
    private $name; 
    private $lastName;
    private $email;
    private $password;
    private $img;
    private $role; 
    private $db;
    public $errors = [];
    
    public function __construct() {
        $this->db = Database::connect();
        $this->role = 2;
    } 

    public function loginUser() {

        if(empty($_POST['user-email'] || $_POST['user-email' == ''] )){
            $_SESSION['errors']['email-error'] = 'The email is required';
            header('Location: ' . BASE_URL . 'user/login');
        } else {
            $this->email = $_POST['user-email'];
            unset($_SESSION['errors']['email-error']);
        }
        if(empty($_POST['user-password']) || $_POST['user-password'] == '') {
            $_SESSION['errors']['email-error'] = 'The email is required';
            header('Location: ' . BASE_URL . 'user/login');
        } else {
            $this->password = $_POST['user-password'];
            unset($_SESSION['errors']['email-error']);
        } 

        $res = $this->db->query("SELECT * FROM users where user_email = '{$this->email}'")->fetch();
        if($res) {
            $auth = password_verify($this->password, $res['user_password']);
            if($auth) {
                $_SESSION['identity'] = $res;
                unset($_SESSION['errors']);
                header('Location:' . BASE_URL);
            } else {
                $_SESSION['errors']['email-error'] = 'The email is incorrect';
                $_SESSION['errors']['password-error'] = 'The password is incorrect';
                header('Location:' . BASE_URL . 'user/login');
            }
        } else {
            $this->errors['email-error'] = 'The email doesnt exists';
            header('location: ' . BASE_URL . 'user/login');
        }
    }

    public function saveUser() {
        if(!isset($_SESSION)) {
            session_start();
        } 
        $this->name = filter_var($_POST['user-name'], FILTER_SANITIZE_STRING);
        if(empty($this->name) || $this->name == '') {
            $_SESSION['errors']['user-error'] = 'The user name is required';
        } else {
            unset($_SESSION['errors']['user-error']);
        }
        
        $this->lastName = filter_var($_POST['user-last-name'], FILTER_DEFAULT);
        if(empty($this->lastName) || $this->lastName == '') {
            $_SESSION['errors']['last-name-error'] = 'The last name is required';
        } else {
            unset($_SESSION['errors']['last-name-error']);
        }
        
        $this->email = filter_var($_POST['user-email'], FILTER_SANITIZE_EMAIL);
        if(empty($this->email) || $this->email == '') {
            $_SESSION['errors']['email-error'] = 'The email is required';
        } else {
            unset($_SESSION['errors']['email-error'] );
        }

        $this->password = $_POST['user-password'];
        if(empty($this->password) || $this->password == '') {
            $_SESSION['errors']['password-error'] = 'The password should not be empty';
        } else {
            $this->password = password_hash($this->password, PASSWORD_BCRYPT);
            unset($_SESSION['errors']['password-error'] );
        }
        
        $this->img = $_FILES;

        $fileName = md5($_FILES['user-image']['name']);
        $filePath = $_FILES['user-image']['tmp_name'];
        move_uploaded_file($filePath,  "./../src/pictures/users/$fileName.jpg" );

        if(!isset($this->img['user-image']['name']) || $this->img['user-image']['name'] == '') {
            $_SESSION['errors']['image-error'] = 'The image is required';
        
        } else {
            unset($_SESSION['errors']['image-error'] );
        }
        
        if(isset($errors)) {
            header('Location: user/register');
        } else {
            $res = $this->db->query("SELECT user_id from users where user_email = '{$this->email}' ")->fetch();
            if($res) {
                $_SESSION['errors']['email-error'] = 'The email already exists';
                header("Location:" . BASE_URL . '/user/register');
            } 
            $sql = "INSERT INTO users VALUES(null, '{$this->name}', '{$this->lastName}', '{$this->email}', '{$this->password}', {$this->role}, '{$fileName}')";
            $register = $this->db->query($sql);
            if($register) {
                $res = $this->db->query("SELECT * from users where user_email = '{$this->email}'");
                session_start();
                $_SESSION['login'] = true;
                $_SESSION['identity'] = $res->fetch();
                header("Location: " . BASE_URL);
            } else {
                session_destroy();
            }
        }
        
    }
    public function adminPanel() {
        require 'views/layout/header.php';
        echo '<main>'; 
        if($_GET['subAction'] == 'brands') {
            require_once 'controllers/brandsController.php';
            require_once 'models/brandsModel.php';
            $brand = new brandsController();
            $brands = $brand->getBrands();
        }
        require 'views/user/panel.php';
        require 'views/layout/aside.php';
        echo '</main>';
    }
}