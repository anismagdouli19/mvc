<?php
/**
 * Created by PhpStorm.
 * User: DEV
 * Date: 02/05/2016
 * Author: Anis Magdouli
 */


class Model{
    protected $db;
    public function __construct()
    {
       // echo 'Je suis la classe modele';
        $this->db = App::$db;
    }
}