<?php require_once 'config/db.php' ?>
<?php $db = Database::connect() ?>

<!DOCTYPE html>
<html lang="en">
    <?php require_once 'views/layout/head.php' ?>
<body>
    <?php 
        if(isset($_GET['action'])) {
            $controller = $_GET['action'];
            
            if($controller == 'user' || $controller == 'products' || $controller == 'brands') {
                require_once "controllers/$controller" . 'Controller.php';
                $method = $_GET['subAction'];
                $className = $controller . 'Controller';
                $controller = new $className();
                $controller->$method();
            } else {
                print('jajaja');
            }
            
        } else {
            require_once 'views/layout/header.php';
            echo '<main>';
            require_once 'views/products/featuresPhones.php';
            require_once 'views/layout/aside.php';
            echo '</main>';
            require_once 'controllers/BrandsController.php';
            $brandsController = new brandsController();
            $brandsController->getBrands();
        }
    ?>
</body>
</html>