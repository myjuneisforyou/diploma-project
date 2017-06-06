<?php

class User {
        
    //insert user into base (registration)
        public static function register($name, $phone, $email, $password, $adress, $city) 
    {
        $db = Db::getConnection();
        
       // $password = password_hash($password, PASSWORD_DEFAULT); //TODO VERIFY
        $sql = 'INSERT INTO user (name, phone, email, password, adress, city) '
                . 'VALUES (:name, :phone, :email, :password, :adress, :city)';

        $result = $db->prepare($sql);
        $result->bindParam(':name', $name, PDO::PARAM_STR);
        $result->bindParam(':phone', $phone, PDO::PARAM_STR);
        $result->bindParam(':email', $email, PDO::PARAM_STR);
        $result->bindParam(':password', $password, PDO::PARAM_STR);
        $result->bindParam(':adress', $adress, PDO::PARAM_STR);
        $result->bindParam(':city', $city, PDO::PARAM_STR);

        return $result->execute();
    }
    
    //name validation
    public static function checkName($name){
        if(strlen($name) >= 2){
            return true;
        }
        return false;
    }
    
    //email validation
    public static function checkEmail($email){
        if(filter_var($email, FILTER_VALIDATE_EMAIL)){
            return true;
        }
        return false;
    }
    
    //check if email already exists
    public static function checkEmailExists($email){
        $db = Db::getConnection();
        
        $sql = "SELECT COUNT(*) FROM user WHERE email = :email";
        $result = $db->prepare($sql);
        $result->bindParam(":email", $email, PDO::PARAM_STR);
        $result->execute();

        if($result->fetchColumn())
            return false;
        return true;
    }
    
    
    //password validation
    public static function checkPassword($password){
        if(strlen($password) >= 6){
            return true;
        }
        return false;
    }
    
    //password2 validation
    public static function checkPasswordCoincidence($password,$password2){
        if($password2 == $password){
            return true;
        }
        return false;
    }
    
    //check user data while login
    public static function checkUserData($email, $password) {
        $db = Db::getConnection();
        
        $sql = 'SELECT * FROM user WHERE email = :email AND password = :password';
        
        $result = $db->prepare($sql);
        $result->bindParam(':email', $email, PDO::PARAM_STR);
        $result->bindParam(':password', $password, PDO::PARAM_STR);
        $result->execute();
        
        $user = $result->fetch();
        if($user){
            return $user['id'];
        }
        return false;
    }
    
    //auth
    public static function auth($userId){
        $_SESSION['user'] = $userId;
    }
    
    //check if logged in
    public static function checkLogged(){
        if(isset($_SESSION['user'])){
            return $_SESSION['user'];
        }
        header("Location: /user/login");
        exit();
    }
    
    //Is user authted? (session on)
    public static function isGuest(){
        if(isset($_SESSION['user'])){
            return false;
        }
        return true;;
    }
    
    //get user's id
    public static function getUserById($userName){
        $userName = intval($userName);

        if ($userName) {                        
            $db = Db::getConnection();
            
            $result = $db->query('SELECT * FROM user WHERE id=' . $userName);
            $result->setFetchMode(PDO::FETCH_ASSOC);
            
            return $result->fetch();
        }
    }
    
    //update User's data
    public static function editData($id, $name, $phone, $adress, $city){
        $db = Db::getConnection();
        
        $sql = 'UPDATE user SET name = :name, phone = :phone, adress = :adress, city = :city
            WHERE id = :id';
        
        $result = $db->prepare($sql);
        $result->bindParam(':id', $id, PDO::PARAM_INT);
        $result->bindParam(':name', $name, PDO::PARAM_STR);
        $result->bindParam(':phone', $phone, PDO::PARAM_STR);
        //$result->bindParam(':email', $email, PDO::PARAM_STR);
        $result->bindParam(':adress', $adress, PDO::PARAM_STR);
        $result->bindParam(':city', $city, PDO::PARAM_STR);
   
        return $result->execute();
    }
    
    //change password
    public static function changePassword($id, $password){
        $db = Db::getConnection();
        
        $sql = 'UPDATE user SET password = :password
            WHERE id = :id';
        
        $result = $db->prepare($sql);
        $result->bindParam(':id', $id, PDO::PARAM_INT);
        $result->bindParam(':password', $password, PDO::PARAM_STR);
   
        return $result->execute();
    }
    
    //change email
    public static function changeEmail($id, $email){
        $db = Db::getConnection();
        
        $sql = 'UPDATE user SET email = :email
            WHERE id = :id';
        
        $result = $db->prepare($sql);
        $result->bindParam(':id', $id, PDO::PARAM_INT);
        $result->bindParam(':email', $email, PDO::PARAM_STR);
   
        return $result->execute();
    }
    
    
    //city validation
    public static function checkCity($city){
        if($city == ''){
            return false;
        }
        return true;
    }
    
    //adress validation
    public static function checkAdress($adress){
        if($adress == ''){
            return false;
        }
        return true;
    }
    
    //phone validation
    public static function checkPhone($phone){
        if(strlen($phone) < 10){
            return false;
        }
        return true;
    }
    
    //message validation
    public static function checkMessage($message){
        if($message == ''){
            return false;
        }
        return true;
    }
}