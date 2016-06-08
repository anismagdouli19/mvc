<?php
/**
 * Created by PhpStorm.
 * User: DEV
 * Date: 02/05/2016
 * Author: Anis Magdouli
 */


class Controller{

    protected $data;
    protected $model;
    protected $params;

    protected  $protect;

    /**
     * @return mixed
     */
    public function getData()
    {
        return $this->data;
    }

    /**
     * @return mixed
     */
    public function getModel()
    {
        return $this->model;
    }

    /**
     * @return mixed
     */
    public function getParams()
    {
        return $this->params;
    }

    public function  __construct($data = array())
    {
        $this->data = $data;
        $this->params = App::getRouter()->getParams();

        if(App::getRouter()->getUri() != ""){
            $test_uri = App::getRouter()->getUri();
            if (in_array($test_uri, Config::get('array_protect'))) {
              // Session::verif();
            }
        }

    }

}