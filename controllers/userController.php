<?php 
    require_once 'config/db.php';
    require_once 'config/parameters.php';
class userController {
    public function register() {
        require_once 'views/user/register.php'; 
    }

    public function login() {
        require_once 'views/user/login.php';
    }
}