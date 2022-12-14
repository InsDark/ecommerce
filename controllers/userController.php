<?php 
    require_once 'config/db.php';
    require_once 'config/parameters.php';
class userController {
    public function register() {
        require_once 'views/user/register.php'; 
    }
    public function products() {
        require_once 'controllers/ProductsController.php';
        $productController = new ProductsController();
        $productController->getProducts();
    }
    public function login() {
        require_once 'views/user/login.php';
    }

    public function panel() {
        require_once 'models/userModel.php';
        $user = new User();
        $userType = $_SESSION['identity']['user_rol'];
        $userType == 1 ? $user->adminPanel() : $user->userPanel();
        require_once 'views/layout/head.php';
    }

    public function brands() {
        require_once 'models/userModel.php';
        $user = new User();
        $userType = $_SESSION['identity']['user_rol'];
        $userType == 1 ? $user->adminPanel() : $user->userPanel();
    }
    public function close() {
        require_once 'models/userModel.php';
        $user = new User();
        $user->closeSession();
    }

    public function cart() {
        require_once 'models/userModel.php';
        $user = new User();
        $user->cart();
    }
}