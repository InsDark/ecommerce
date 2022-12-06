<?php 
class brandsModel {
    public function getBrands() {
        require_once 'config/db.php';
        $brands = [];
        $db = Database::connect();
        $res= $db->query("SELECT * FROM brands");
        while ($row = $res->fetchObject()) {
            $brands[] = $row; 
        }
        require_once 'views/layout/asideBrands.php';
    }
    public function index() {
        $this->getBrands();
    }
}