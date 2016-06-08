<?php
/**
 * Created by PhpStorm.
 * User: DEV
 * Date: 02/05/2016
 * Author: Anis Magdouli
 */

 class Config 
 {
 	protected static $setting = array();

 	public static function get($key)
 	{
 		return isset(self::$setting[$key]) ? self::$setting[$key] : null;
 	}
 	public static function set($key, $value)
 	{
 		self::$setting[$key] = $value;
 	}
 	
 } 

 ?>