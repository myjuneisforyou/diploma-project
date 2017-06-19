<?php

class Cart {
    
    public static function addToCart($id){
        $id = intval($id);
        
        $productInCart = [];
        
        if(isset($_SESSION['product'])){
            $productInCart = $_SESSION['product'];
        }
        
        if(array_key_exists($id, $productInCart)){
            $productInCart[$id]++;
        }else{
            $productInCart[$id] = 1;
        }
        
        $_SESSION['product'] = $productInCart;
        return self::countItems();
    }
    
    public static function countItems(){
        
        if(isset($_SESSION['product'])){
            $count = 0;
            foreach ($_SESSION['product'] as $id => $quantity){
                $count += $quantity;
            }
            return $count;
        }else{
            return 0;
        }
    }
    
    public static function getProducts(){
        
        if(isset($_SESSION['product'])){
            return $_SESSION['product'];
        }
        return false;
    }
    
    public static function getTotalPrice($products){
        
        $productInCart = self::getProducts();
        
        $total = 0;
        
        if($productInCart){
            foreach ($products as $item){
                $total += $item['price'] * $productInCart[$item['id']];
            }
        }
        return $total;
    }
    
    public static function deleteProduct($id){
     
        $productInCart = self::getProducts();
        
        unset($productInCart[$id]);
        
        $_SESSION['product'] = $productInCart;
    }
    
     public static function clear(){
        if(isset($_SESSION['product'])){
            unset($_SESSION['product']);
        }
    }
}
