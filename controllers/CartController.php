<?php

include_once (ROOT.'/models/Cart.php');
include_once (ROOT.'/models/Product.php');
include_once (ROOT.'/models/User.php');
include_once (ROOT.'/models/Category.php');
include_once (ROOT.'/models/Order.php');

class CartController{
    
    // add to cart
    public function actionAdd($id){
        
        echo Cart::addToCart($id);
        return true;
    }
     
    //delete product
    public function actionDelete($id){  
        Cart::deleteProduct($id);
        header("Location: /cart");
    }
    
    public function actionIndex (){
        
        $categories = Category::getCategoryList();
        
        $productInCart = false;
        
        $productInCart = Cart::getProducts();
        
        if($productInCart){
            //full product info
            $productId = array_keys($productInCart);
            $products = Product::getProductByIds($productId);
            
            //total price
            $totalPrice = Cart::getTotalPrice($products);   
        }
        require_once (ROOT.'/views/cart/index.php');
        return true;
    }
    
    public function actionCheckout(){
        
        if(User::isGuest()){}else{
            $userId = User::checkLogged();
            $user = User::getUserById($userId);         
        }
        $result = false;
        
        If(isset($_POST['submit'])){
            
            $name = $_POST['name'];
            $phone = $_POST['phone'];
            $email = $_POST['email'];
            $city = $_POST['city'];
            $adress = $_POST['adress'];
            
            $error = false;
            
            //name validation
            if(!User::checkName($name)){
                $error_name = "Введите имя!";
                $error = true;    
            }
            //phone validation
            if(!User::checkPhone($phone)){
                $error_phone = "Введите номер телефона";
                $error = true;
            }
            //email validation
            if(!User::checkEmail($email)){
                $error_email = "Введите Еmail!"; 
                $error = true;
            }
            //city validation
            if(!User::checkCity($city)){
                $error_city = "Введите Ваш город!";
                $error = true;    
            }
            //adress validation
            if(!User::checkAdress($adress)){
                $error_adress = "Введите адрес доставки!";
                $error = true;    
            }
            //Форма заполнена верно
            if($error == false){
                
                $productInCart = Cart::getProducts();
                
                if(User::isGuest()){$userId = false;}else{$userId = User::checkLogged();}
                
                $result = Order::save($name, $phone, $email, $city, $adress, $userId, $productInCart);
                
                if($result){
                    $adminEmail = "support@istore.com";
                    $subject = "New Order";
                    $message = "New order";
                    mail($adminEmail, $subject, $message);
                    
                    Cart::clear();
                    
                    header("Refresh: 4; URL=http://istore");
                }
            }else{
                    $productInCart = Cart::getProducts();
                    $productsId = array_keys($productInCart);
                    $products = Product::getProductByIds($productsId);
                    $totalPrice = Cart::getTotalPrice($products);
                    $totalQuantity = Cart::countItems();  
                }
            }else{
                 $productInCart = Cart::getProducts();
                 
                 if($productInCart == false){
                    header("Location: /");
                 }else{
                    $productsId = array_keys($productInCart);
                    $products = Product::getProductByIds($productsId);
                    $totalPrice = Cart::getTotalPrice($products);
                    $totalQuantity = Cart::countItems();         
                }
            }
        require_once (ROOT.'/views/cart/checkout.php');
        return true;
    }
}

