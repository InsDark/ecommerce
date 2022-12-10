<?php 
class brandsModel {
    private $db;
    private $brandName;

    public function __construct() {
        require_once 'config/db.php';
        $this->db = Database::connect();

    }
    public function getBrands() {
        $brands = [];
        $res= $this->db->query("SELECT * FROM brands");
        while ($row = $res->fetchObject()) {
            $brands[] = $row; 
        }
        return $brands;
    }

    public function index() {
        $res = $this->getBrands();
        return $res;
    }
    public function addBrand() {
        $this->brandName = $_POST['brand-name'];
        if(!empty($this->brandName)) {
            $this->db->query("INSERT INTO brands VALUES (null, '{$this->brandName}')");
            header('Location: ' . BASE_URL . 'user/brands/');
        }
    }

    public function deleteBrand() {
        $this->brandName = $_GET['extra'];
        if(!empty($this->brandName)) {
            $this->db->query("DELETE FROM brands WHERE brand_name = '{$this->brandName}' ");
            header('Location: ' . BASE_URL . 'user/brands/');
        }
    }
}