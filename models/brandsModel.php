<?php 
class brandsModel {
    private $db;
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
        
    }
}