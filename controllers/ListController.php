<?php
include_once (ROOT.'/models/Category.php');
include_once (ROOT.'/models/Product.php');
include_once (ROOT.'/models/ProductCategory.php');
include_once (ROOT.'/models/User.php');
include_once (ROOT.'/models/Cart.php');

class ListController {
    
    //list/$1
    public function actionCatalog($finaList){
        
        //Категории
        $categories = Category::getCategoryList();
       
        //Вывод определенных моделей
        $finalProducts = Product::getFinalProductList($finaList);
        
        
        require_once (ROOT.'/views/list/catalog.php');
        return true;
    }
   
    //catalog/$1
    public function actionCategory($categoryId){
        
        //Категории
        $categories = Category::getCategoryList(); 
        
        //Модели одной категории
        $categoryProduct = ProductCategory::getProductsListByCategory($categoryId);
              
        require_once (ROOT.'/views/list/list.php');
        return true;
    }
   
}
