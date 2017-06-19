<?php
include_once (ROOT.'/models/User.php');
include_once (ROOT.'/models/Cart.php');

class AccountController {
    
    public function actionAccount()
    {
        $userId = User::checkLogged();
        
        $user = User::getUserById($userId);
        
        require_once (ROOT.'/views/account/account.php');
        return true;
    }
    
    public function actionEdit(){
        
        $userId = User::checkLogged();
        
        $user = User::getUserById($userId);
        
        $method = $_POST;
        
        $result = false;
        if(isset($method['submit'])){
            
            $name = $method['name'];
            $city = $method['city'];
            $adress = $method['adress'];
            //$email = $method['email'];
            $phone = $method['phone'];
            
            $error = false;
            //namе validation
            if(!User::checkName($name)){
                $error_name = "Введите имя!";
                $error = true;    
            }
            //city validation
            if(!User::checkCity($city)){
                $error_city = "Введите Ваш город!";
                $error = true;    
            }
            //phone validation
            if(!User::checkPhone($phone)){
                $error_phone = "Введите номер телефона";
                $error = true;
            }
            //adress validation
            if(!User::checkAdress($adress)){
                $error_adress = "Введите адрес доставки!";
                $error = true;    
            }
            // update data
            if($error == false){
                $result = User::editData($userId, $name, $phone, $adress, $city);
                header('Refresh: 2; URL=http://istore/account');
            }   
        }   
        require_once (ROOT.'/views/account/edit.php');
        return true;
    }
    
    public function actionChangepassword(){
        
        $userId = User::checkLogged();
        
        $user = User::getUserById($userId);
        
        $method = $_POST;
        
        $result = false;
        if(isset($method['submit'])){
            
            $password = $method['password'];
            $password2 = $method['password2'];
            
            $error = false;

            //password validation
            if(!User::checkPasswordCoincidence($password, $password2)){
                $error_password2 = "Введённые Вами пароли не совпадают!";   
                $error = true;
            }
            if(!User::checkPassword($password)){
                $error_password = "Введёный Вами пароль содержит менее 6-ти символов!"; 
                $error = true;
            }
            // update password
            if($error == false){
                $result = User::changePassword($userId, $password);
                header('Refresh: 2; URL=http://istore/account');
            }   
        }
        require_once (ROOT.'/views/account/password.php');
        return true;
    }
    
    public function actionChangemail(){
        
        $userId = User::checkLogged();
        
        $user = User::getUserById($userId);
        
        $method = $_POST;
        
        $result = false;
        if(isset($method['submit'])){
            
            $email = $method['email'];
            
            $error = false;
            if(!User::checkEmail($email)){
                $error_email = "Введите Еmail!"; 
                $error = true;
            }
            if(!User::checkEmailExists($email)){
                $error_email2 = "Данный Email уже используется!";
                $error = true;
            }
            
            if($error == false){
                $result = User::changeEmail($userId, $email);
                header('Refresh: 2; URL=http://istore/account');
            }
        }
        require_once (ROOT.'/views/account/email.php');
        return true;
    }
}
