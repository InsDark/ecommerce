<?php 
require_once 'config/db.php';
class Products {
    private $db ;
    private $brand;
    private $stock;
    private $image;
    private $model;
    private $description;
    private $price;

    public function getProducts() {
        require_once 'views/layout/header.php';
        require_once 'controllers/brandsController.php';
        $brand = new brandsController();
        $brands = $brand->getBrands();

        echo '<main>';
        $res = $this->db->query("SELECT * FROM products")->fetchAll();
        require_once 'views/user/panel.php';
        require_once 'views/layout/aside.php';
        echo '</main>';

    }

    public function getAllProducts() {
        $res = $this->db->query("SELECT * FROM products")->fetchAll();
        return $res;
    }
    public function viewProduct() {
        $product = $this->db->query("SELECT * FROM products where product_id = {$_GET['extra']}")->fetch();

        require 'views/layout/header.php';
        echo '<main>';
        echo "<section>" ?>
            <h1><?=$product['product_model']?></h1>
            <img src='<?=BASE_URL?>src/pictures/products/<?=$product['product_image']?>'>
            <div class='products-details'>
                <h2>Price: <span> $ <?= $product['product_price']?></span></h2>
                <h2>Stock: <span> <?= $product['product_stock']?> Units </span></h2>
                <p><?= $product['product_description']?></p>
                <a href="<?= BASE_URL?>product/addToCart">Add to cart</a>
            </div>
        </section>
        <?php  require 'views/layout/aside.php';
        echo '</main>';
        
    }
    public function addProduct() {
        $this->brand = $_POST['product-brand'];
        $this->model = $_POST['product-model'];
        $this->price = $_POST['product-price'];
        $this->stock = $_POST['product-stock'];
        $this->description = $_POST['product-description'];
        $this->image = $_FILES;
        echo '<pre>';
        var_dump($this);
        echo '</pre>';
        move_uploaded_file($_FILES['product-image']['tmp_name'], 'src/pictures/products/' . $_FILES['product-image']['name']);

        $this->db->query("INSERT INTO products VALUES (null, {$this->brand}, '{$this->model}', '{$this->description}', {$this->price}, {$this->stock}, '{$_FILES['product-image']['name']}') ");
        header('Location: ' . BASE_URL . 'user/products/');
    }

    public function deleteProduct($id) {
        $this->db->query("DELETE FROM products WHERE product_id = {$id}");
        header("Location: " . BASE_URL . 'user/products/');
    }
    public function __construct() {
        $this->db =  Database::connect();
    }
    public function addToCart() {
        session_start();
        $_SESSION['cart'][] = $_GET['extra']; 
        header('Location:' . BASE_URL. 'user/cart/');
    }
}