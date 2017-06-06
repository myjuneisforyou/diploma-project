<?php


include_once (ROOT.'/models/User.php');
include_once (ROOT.'/models/Cart.php');

class InfoController {
    
    public function actionAbout(){
        require_once (ROOT.'/views/info/about.php');
        return true;
    }
    
    public function actionFeedback(){
           
        if(User::isGuest()){}else{
            $userId = User::checkLogged();
            $user = User::getUserById($userId);     
        }
        $result = false;
        if(isset($_POST['submit'])){
            
            $name = $_POST['name'];
            $email = $_POST['email'];
            $message = $_POST['message'];
            $subject = $_POST['subject'];
            
            $error = false;
            
            if(!User::checkName($name)){
                $error_name = "Введите имя!";
                $error = true;    
            }
            if(!User::checkEmail($email)){
                $error_email = "Введите Еmail!"; 
                $error = true;
            }
            if(!User::checkMessage($message)){
                $error_message = "Заполните поле сообщения!";
                $error = true;
            }
            
            if($error == false){
                $adminEmail = "support@istore.com";
                $txt = $message;
                $sub = $subject;
                $headers = "From: $email" . "\r\n" .
                      "Name: $name" . "\r\n" . 
                      "Reply-To: $email" . "\r\n" .
                      "Content-Type:text/plain; charset=utf-8";
                $result = mail($adminEmail, $sub, $txt, $headers);
                $result = true;
                
                header("Refresh: 4; URL=http://istore");
            }
        }  
        require_once (ROOT.'/views/info/feedback.php');
        return true;
    }
    
    public function actionDeliver(){
        
        require_once (ROOT.'/views/info/deliver.php');
        return true;
    }
}
