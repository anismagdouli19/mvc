<?php
/**
 * Created by PhpStorm.
 * User: DEV
 * Date: 02/05/2016
 * Author: Anis Magdouli
 */


class Router
{
	protected $uri;
	protected $controller;
	protected $action;
	protected $params;

	protected $route;
	protected $method_prefix;
	protected $language;



	public function getController()
	{
	    return $this->controller;
	}
	
	public function getUri()
	{
	    return $this->uri;
	}
	
	public function getAction()
	{
	    return $this->action;
	}

	public function getParams()
	{
	    return $this->params;
	}
	
	public function getRoute()
	{
	    return $this->route;
	}
	public function getMethodPrefix()
	{
	    return $this->method_prefix;
	}
	public function getLanguage()
	{
	    return $this->language;
	}
	public function __construct($uri)
	{
		

		$this->uri = urldecode(trim($uri,'/'));

		$routes = Config::get('routes');
		$this->route = Config::get("default_root");
		$this->method_prefix = isset($routes[$this->route]) ? $routes[$this->route] : '';
		$this->language = Config::get("default_language");
		$this->controller = Config::get("default_controller");
		$this->action = Config::get("default_action");

		

		$uri_parts = explode('?', $this->uri);
		$path = $uri_parts[0];
		$path_parts = explode('/', $path);
		//echo "<pre>" . var_dump($path_parts)."</pre>";

		if(count($path_parts))
		{
			//var_dump(strtolower(current($path_parts)));
			//print_r($path_parts);
			//Get route or language at first element
			if ( in_array(strtolower(current($path_parts)), array_keys($routes)) ) {
				//echo "route" . var_dump(strtolower(current($path_parts)));
				$this->route = strtolower(current($path_parts));
				$this->method_prefix = isset($routes[$this->route]) ? $routes[$this->route] : '';
				array_shift($path_parts);
			}elseif (in_array(strtolower(current($path_parts)), Config::get('languages') )) {
				//echo "Language" . var_dump(strtolower(current($path_parts)));
				$this->language = strtolower(current($path_parts));
				array_shift($path_parts);
			}

			if (current($path_parts)) {
				$this->controller = strtolower(current($path_parts));
				array_shift($path_parts);

			}
			if (current($path_parts)) {
				$this->action = strtolower(current($path_parts));
				array_shift($path_parts);
			}

			$this->params = $path_parts;
		}



	}
	

	
}

 ?>