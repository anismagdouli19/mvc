<?php
/**
 * Created by PhpStorm.
 * User: DEV
 * Date: 02/05/2016
 * Author: Anis Magdouli
 */


class Session{
    protected static $flash_message = "";


    public static function setFlash($message)
    {
        self::$flash_message = $message;
    }
    public static function hasFlash()
    {
        if(self::$flash_message != "" ){
            return true;
        }
        else{
            return false;
        }
        echo '---'. self::$flash_message;
    }
    public static function flash()
    {
        echo "Msg = ". self::$flash_message;
        self::$flash_message = "";
    }

    public static function setSessionUser($array){
        $_SESSION['user'] = $array;
    }


}