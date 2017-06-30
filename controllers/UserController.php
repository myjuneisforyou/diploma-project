<?php
include_once (ROOT.'/models/User.php');
include_once (ROOT.'/models/Cart.php');

class UserController 
{
    //registration
    public function actionSignup()
    {
        $method = $_POST;
        
        $result = false;
        if(isset($method['submit']))
        {
            
            $name = $method['name'];
            $email = $method['email'];
            $password = $method['password'];
            $password2 = $method['password2'];
            
            $error = false;
            
            if(!User::checkName($name)){
                $error_name = "Введите имя!";
                $error = true;    
            }
  
            if(!User::checkEmailExists($email)){
                $error_email = "Такой Еmail уже существует!";
                $error = true;
            }
            
            if(!User::checkEmail($email)){
                $error_email = "Введите Еmail!"; 
                $error = true;
            }

            if(!User::checkPassword($password)){
                $error_password = "Пароль должен содержать не менее 6-ти символов!"; 
                $error = true;
            }
            
            if(!User::checkPasswordCoincidence($password, $password2)){
                $error_password2 = "Введённые Вами пароли не совпадают!";   
                $error = true;
            }
            
            if($error == false){
                $result = User::register($name, $email, $password);
                header('Refresh: 1; URL=http://istore/user/login');
            } 
        }
        require_once (ROOT.'/views/user/signup.php');
        return true;
    }
    //login
    public function actionLogin()
    {
        $method = $_POST;
        
        if(isset($method['submit']))
        {
            $email = $method['email'];
            $password = $method['password'];
            
            $error = false;
            
            if(!User::checkEmail($email)){
                $error_email = "Введите Еmail!"; 
                $error = true;
            }

            if(!User::checkPassword($password)){
                $error_password = "Введите пароль!"; 
                $error = true;
            }
            
        
            $userId = User::checkUserData($email, $password);
            if(!$userId){
               $error_error = "Вы ввели неправильные данные";
            }else{
                User::auth($userId);
                header("Location: /account");
                exit();
            }
        }
        
        require_once (ROOT.'/views/user/login.php');
        return true;
    }
    //logout
    public function actionLogout(){
        unset($_SESSION['user']);
        header("Location: /");
    }
}
