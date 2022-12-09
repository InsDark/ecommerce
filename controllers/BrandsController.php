<?php 
class brandsController {
    public function getBrands() {
        $brands = new brandsModel();
        $res = $brands->index();
        return $res;
    }
}