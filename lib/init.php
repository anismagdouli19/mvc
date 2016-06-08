<?php
/**
 * Created by PhpStorm.
 * User: DEV
 * Date: 02/05/2016
 * Author: Anis Magdouli
 */


require_once(ROOT.DS.'config'.DS.'config.php');
 function __autoload($class_name)
 {
    $lib_path = ROOT.DS.'lib'.DS.strtolower($class_name).'.class.php';
    $controller_path = ROOT.DS.'controllers'.DS.str_replace("controller", "", strtolower($class_name)).'.controller.php';
    $model_path = ROOT.DS.'models'.DS.str_replace("controller", "", strtolower($class_name)).'.php';
    $lang_path = ROOT.DS.'lib'.DS.'lang.php';

     if (file_exists($lang_path)) {
         require_once($lang_path);

     }

 	if (file_exists($lib_path)) {
 		require_once($lib_path);
    }elseif (file_exists($controller_path)) {
 		require_once($controller_path);

            require_once($controller_path);
            // echo 'Model Call';
        if (file_exists($model_path)) {
            require_once($model_path);
        }

    }elseif (file_exists($model_path)) {
        require_once($model_path);
       // echo 'Model Call';
    }else{

       //header("location: ".Config::get("error.404"));
        throw new Exception("Erreur de chargement de la classe : " . $class_name);
       // echo "erreur de chargement";
 	}
 }

function __($key,$default_value = '')
{
    return Lang::get($key ,$default_value);
}


function flash( $name = '', $message = '', $class = 'success fadeout-message' )
{
    //var_dump($_SESSION);
    //We can only do something if the name isn't empty
    if( !empty( $name ) )
    {
        //No message, create it
        if( !empty( $message ) and empty( $_SESSION[$name] ) )
        {
            if( !empty( $_SESSION[$name] ) )
            {
                unset( $_SESSION[$name] );
            }
            if( !empty( $_SESSION[$name.'_class'] ) )
            {
                unset( $_SESSION[$name.'_class'] );
            }

            $_SESSION[$name] = $message;
            $_SESSION[$name.'_class'] = $class;
        }
        //Message exists, display it
      elseif( !empty( $_SESSION[$name] )and  empty( $message ) )
        {
            $class = !empty( $_SESSION[$name.'_class'] ) ? $_SESSION[$name.'_class'] : 'success';
            echo '<div class="alert alert-'.$class.'" id="msg-flash">'.$_SESSION[$name].'</div>';
            unset($_SESSION[$name]);
            unset($_SESSION[$name.'_class']);
        }
    }
}



 ?>