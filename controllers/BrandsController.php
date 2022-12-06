<?php 
class brandsController {
    public function getBrands() {

        require_once 'models/brandsModel.php';
        $brands = new brandsModel();
        $brands->index();
    }
}