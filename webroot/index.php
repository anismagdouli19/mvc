<?php 
session_start();
define('DS', DIRECTORY_SEPARATOR) ;
define('ROOT', dirname(dirname(__FILE__))) ;
define('VIEWS_PATH', ROOT.DS.'views') ;
define('ENV', "dev") ;

//var_dump($_SERVER);
define("REQUEST_SCHEME",$_SERVER["REQUEST_SCHEME"]);
define ('HOST', $_SERVER['HTTP_HOST']);
$server_explode = explode("/",$_SERVER["REQUEST_URI"]);

define("First_uri",$server_explode[1]);

    if(ENV == "dev"){
        //define("URL_SITE" , REQUEST_SCHEME."://".HOST."/".First_uri."/");
        define("URL_SITE" , REQUEST_SCHEME."://".HOST."/");
    }
    else{
        define("URL_SITE" , REQUEST_SCHEME."://".HOST."/");
    }


/* Mode développement  */

$uri = $_SERVER["REQUEST_URI"];
$url = explode("/" , $uri);

// Test ------------------------------------------
//$uri = str_replace($url[1]."/", "", $uri);
//print_r($uri);
//controller/action/param1/param2/.....

require_once(ROOT.DS.'lib'.DS.'init.php');
$router = new Router($_SERVER["REQUEST_URI"]);
App::run($uri);




// debug ------------------------------------------
/*
if(ENV == "dev"){
	//$router = new Router($uri);
	$router = new Router($_SERVER["REQUEST_URI"]);

	error_reporting(E_ALL);
	ini_set("display_errors", 1);
}else{
	$router = new Router($_SERVER["REQUEST_URI"]);

}
*/



// debug ------------------------------------------

/*
echo "<pre>";
print_r("Route ". $router->getRoute().PHP_EOL);
print_r("Language ". $router->getLanguage().PHP_EOL);
print_r("Controller ". $router->getController().PHP_EOL);
print_r("Action ". $router->getMethodPrefix()."".$router->getAction().PHP_EOL);
echo "Params ";
print_r($router->getParams());
echo "</pre>";
*/



// debug ------------------------------------------

/*
 * debug data base
    $test = App::$db->query("select * from users");
    echo "<pre>";
    print_r($test);

    $test2 = App::$db->query("select count(*) from users");
    echo "<pre>";
    print_r($test2);
*/

?>