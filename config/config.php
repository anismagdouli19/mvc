<?php
/**
 * Created by PhpStorm.
 * User: DEV
 * Date: 02/05/2016
 * Author: Anis Magdouli
 */

	Config::set("site_name", "FoxyApps");
	Config::set("languages", array('en','fr','ar'));

	Config::set("routes",array(
		"default" => '',
		"backend" => '',
		"admin" => "admin_"
		));
	
	Config::set("default_root", "default");
	Config::set("default_language", "fr");
	Config::set("default_controller", "page");
	Config::set("default_action", "index");

	/*Define layout an controller*/
	Config::set("error_controller","error");
	Config::set("error_layout","error");


	/*Nom des Page */
	Config::set("page_title","none");
	/* Database config */

	Config::set("db.host","localhost");
	Config::set("db.user","root");
	Config::set("db.password","");
	Config::set("db.name","mvc");

	/*Errors page*/
	Config::set("error.404",URL_SITE."error/");
	Config::set("error.in",URL_SITE."error/error_in");
	Config::set("error.auth",URL_SITE."error/auth");
	Config::set("error.lang'",URL_SITE."error/lang");


   /* Protected page*/
	Config::set('array_protect',array(
		"page",
		"error",

	));

 ?>