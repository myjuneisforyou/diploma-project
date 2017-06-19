<?php

class Router {
    
    private $routes; //Массив с routes.php
    
    public function __construct() {
        $routesPath = ROOT . '/config/routes.php';
        $this->routes = include($routesPath); //занесения массива routes.php в $routes
    }
    
    //Получает строку запроса клиента
    private function getURI(){
        if(!empty($_SERVER['REQUEST_URI'])){
            return trim($_SERVER['REQUEST_URI'], '/');
        }
    } 


    public function run(){
        
        $uri = $this->getURI(); 
        
        //Проверка наличия маршрута в routes.php 
        foreach ($this->routes as $uriPattern => $path){
                
            //Сравнения запроса в строке с маршрутами в routes.php
            if(preg_match("~$uriPattern~", $uri)){
                
                //Определение внутреннего маршрута (/news/sport/1)
                $internalRoutes = preg_replace("~$uriPattern~", $path, $uri);
                
                //Определение Controller and action
                $segments = explode('/', $internalRoutes);
                
                $controllerName = ucfirst(array_shift($segments).'Controller'); //Определение Controller (controllers/)
                $actionName = 'action'.ucfirst(array_shift($segments)); //Определение action (method)
               
                $parameters = $segments; //массив с параметрами строки

                $controllerFile = ROOT.'/controllers/'.$controllerName.'.php'; //Путь к файлам контроллерам
                
                //Подключение нужного файла FileController (controllers/)
                if(file_exists($controllerFile)){
                    include_once ($controllerFile);
                }
                
                $controllerObject = new $controllerName();//Создание объекта класса контроллера
                $result = call_user_func_array(array($controllerObject,$actionName), $parameters);//Вызов метода
                
                if($result != null){
                    break;
                }              
            }
        }
    }
}
