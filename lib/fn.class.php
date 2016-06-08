<?php
/**
 * Created by PhpStorm.
 * User: DEV
 * Date: 02/05/2016
 * Author: Anis Magdouli
 */


class Fn
 {
	 public static  function output()
	 {
		 echo "string";
	 }
	 public static  function load_script($array)
	 {
		 if (!empty($array)){

			 foreach ($array as $value)
			 {
				 echo  '<script src="'.URL_SITE.'/js/'.$value.'.js"></script>';
				 //echo URL_SITE;
			 }
		 }
	 }
 } ?>