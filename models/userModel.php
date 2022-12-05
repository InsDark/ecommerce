<?php 
    require_once 'config/parameters.php';
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
        $this->role = 1;
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
            $_SESSION['errors']['last-name-error'] = '';
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
        if(!isset($this->img['user-image']['name']) || $this->img['user-image']['name'] == '') {
            $_SESSION['errors']['image-error'] = 'The image is required';
        
        } else {
            unset($_SESSION['errors']['image-error'] );
        }
        
        
        $res = $this->db->query("SELECT user_id from users where user_email = '{$this->email}' ")->fetch();
        if($res) {
            $_SESSION['errors']['email-error'] = 'The email already exists';
            return;
        } 
        $sql = "INSERT INTO users VALUES(null, '{$this->name}', '{$this->lastName}', '{$this->email}', '{$this->password}', {$this->role}, '{$this->img}')";
        $res = $register = $this->db->query($sql);
        if($res) {
            session_start();
            $_SESSION['login'] = true;
            header("Location: " . BASE_URL);
        } else {
            session_destroy();
        }
    }
}

$user = new User();
$user->saveUser();