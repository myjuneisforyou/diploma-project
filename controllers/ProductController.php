<?php

include_once (ROOT.'/models/Category.php');
include_once (ROOT.'/models/Product.php');
include_once (ROOT.'/models/User.php');
include_once (ROOT.'/models/Cart.php');

class ProductController {
    //product/$1
    public function actionView($productId){
        
        //$categories = [];
        $categories = Category::getCategoryList();
        
        //$product = [];
        $product = Product::getProductById($productId);
        require_once (ROOT.'/views/product/view.php');
        return true;
    }
}
