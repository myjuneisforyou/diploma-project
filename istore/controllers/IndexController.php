<?php

include_once (ROOT.'/models/Category.php');
include_once (ROOT.'/models/Product.php');
include_once (ROOT.'/models/User.php');
include_once (ROOT.'/models/Cart.php');

class IndexController {
    
    public function actionIndex()
    {
       // $categories = [];
        $categories = Category::getCategoryList(); //список с категориями
        
        
       // $latestProducts = [];
        $latestProducts = Product::getLatestProducts(9); //вывод последних товаров

        require_once (ROOT.'/views/index/index.php');
        return true;
    }
}
