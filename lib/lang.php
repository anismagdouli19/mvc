<?php
/**
 * Created by PhpStorm.
 * User: DEV
 * Date: 02/05/2016
 * Author: Anis Magdouli
 */


class Lang
{

    protected static $data;

    public static function load($lang_code){
       $lang_file_path = ROOT.DS.'lang'.DS.strtolower($lang_code).'.php';
        if (file_exists($lang_file_path)){
            self::$data = include ($lang_file_path);
        }
        else{
            //echo Config::get('error.lang');
            //header("Location:". Config::get('error.lang'));
            //throw new Exception ("Language not found ");
        }
    }

    public static function get($key,$default_value = ""){
        return isset(self::$data[strtolower($key)]) ? self::$data[strtolower($key)] : $default_value;
    }
}