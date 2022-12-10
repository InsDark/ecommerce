<?php 

class productsController {
    public function getProducts() {
        require_once 'models/productsModel.php';
        $products = new Products();
        $products->getProducts();
    }
    public function addProduct() {
        require_once 'models/productsModel.php';
        $products = new Products();
        $products->addProduct();
    }
    public function delete() {
        require_once 'models/productsModel.php';
        $products = new Products();
        $productId = $_GET['extra'];
        $products->deleteProduct($productId);
    }
    public function getAllProducts() {
        require_once 'models/productsModel.php';
        $products = new Products();
        $res= $products->getAllProducts();
        return $res;
    }
    public function view() {
        require_once 'models/productsModel.php';
        $products = new Products();
        $res= $products->viewProduct();
    }
    public function addToCart() {
        require_once 'models/productsModel.php';
        $products = new Products();
        $res= $products->addToCart();

    }
}