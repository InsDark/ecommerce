<?php 
require_once './models/brandsModel.php';
class brandsController {
    public function getBrands() {
        $brands = new brandsModel();
        $res = $brands->index();
        return $res;
    }
    public function addBrand() {
        $brands = new brandsModel();
        $brands->addBrand();
    }
    public function deleteBrand() {
        $brands = new brandsModel();
        $brands->deleteBrand();
    }
}