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
            } 
            
        } else {
            require_once 'views/layout/header.php';
            require_once 'controllers/ProductsController.php';
            $products = new ProductsController();
            $res = $products->getAllProducts(); ?>
            <main> 
                <section> 
                <h1>Phones Available</h1>
                    <div class='products'>
            <?php foreach($res as $product) : ?>
                    <div class='product'>
                        <h3><?= $product['product_model']?></h3>
                        <img src="src/pictures/products/<?= $product['product_image']?>" alt="phone-img">
                        <div class='product-details'>
                            <span>$ <?= $product['product_price']?></span> -
                            <span> <?= $product['product_stock']?> Units</span>
                        </div>
                        <a href="<?= BASE_URL . 'products/view/' . $product['product_id']?>">View Product</a>
                        <a >Add to Cart</a>
                    </div>
                    <?php endforeach; ?> 
                </div>
            </section>
            <?php 
            require_once 'views/layout/aside.php';
            echo '</main>';
            require_once 'controllers/BrandsController.php';
            $brandsController = new brandsController();
            $brandsController->getBrands();
        }
    ?>
</body>
</html>