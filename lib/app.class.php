<?php
/**
 * Created by PhpStorm.
 * User: DEV
 * Date: 02/05/2016
 * Author: Anis Magdouli
 */

class App{
    protected static $router;
    public static $db;

    /**
     * @return mixed
     */
    public static function getRouter()
    {
        return self::$router;
    }

    public static function run($uri){
        self::$router = new Router($uri);

        self::$db = new DB(Config::get('db.host'),Config::get('db.user'),Config::get('db.password'),Config::get('db.name'));
        //self::$db = new PDO('mysql:host='.Config::get('db.host').';dbname='.Config::get('db.name'),'root','');

        //print_r(self::$db);
        //print_r(self::$router->getLanguage());

        Lang::load(self::$router->getLanguage());

        $controller_class = ucfirst(self::$router->getController()."Controller");
        $controller_method = strtolower(self::$router->getMethodPrefix().self::$router->getAction());




        $layout = self::$router->getRoute();
        if ($layout == "admin"){

            header("Location:". Config::get('error.auth'));
        }

        // Call controll method
        $controller_object = new $controller_class();
        if (method_exists($controller_object, $controller_method)){
            //Controller action may return a view path
            $viw_path = $controller_object->$controller_method();
            $view_object = new View($controller_object->getData(),$viw_path);
            $content = $view_object->render();
            //$result = $controller_object->$controller_method();
        }else{
            //header("location: ".URL_SITE."error");
            throw new Exception ('Methode inexistante');
        }
        $layout_path = VIEWS_PATH.DS.$layout.'.html';
        if (self::$router->getController() == Config::get("error_controller")){
            $layout_path = VIEWS_PATH.DS.Config::get("error_layout").'.html';
        }
        $layout_view_object = new View(compact('content'),$layout_path);
       // echo $layout_path;
        echo $layout_view_object->render();
    }
}