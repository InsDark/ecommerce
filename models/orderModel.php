<?php 
require_once 'config/db.php';
class Order {
    private $db;
    public function makeOrder() {
        session_start();
        $product_id = $_GET['extra'];
        $query = 'SELECT product_price from products WHERE product_id = ' . $product_id;
        $res = $this->db->query($query)->fetch();
        
        $query = "INSERT INTO orders VALUES(null, {$_SESSION['identity']['user_id']}, 'Coronel Portillo', 'Amarilis', 'Mystogan #687', {$res['product_price']}, 'ongoing', CURDATE())";
        $this->db->query($query);
        header('Location:' . BASE_URL . 'user/cart/');
    }
    public function __construct() {
        $this->db =  Database::connect();
    }
}