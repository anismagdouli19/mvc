<?php
/**
 * Created by PhpStorm.
 * User: DEV
 * Date: 02/05/2016
 * Author: Anis Magdouli
 */

class  PageController extends Controller{


    public function __construct($data = array())
    {
        parent::__construct($data);
        $this->model = new  Page();
        //print_r($this->model ->getList());
    }

    public function index(){
        $this->data["var1"] =  $this->model->getList();
        Config::set("page_title","Index");
    }

    public function view(){
        $params = App::getRouter()->getParams();
        if(isset($params[0])){
            $alis = strtolower($params[0]);
            $this->data["var2"] =  "Page with param";
        }else{
            $this->data["var2"] =  "Here we call another page without param";
            Config::set("page_title","View");
        }
    }
    public function admin_index(){

    }
    public function admin_edit(){
        Config::set("page_title","Admin Edit");
    }

}