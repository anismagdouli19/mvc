<?php
/**
 * Created by PhpStorm.
 * User: DEV
 * Date: 02/05/2016
 * Author: Anis Magdouli
 */



class Page  extends Model {
    //protected  $db;

    /*public  function __construct()
    {
        $this->db = App::$db;
    }*/

    public function getList(){
        $sql = "select * from users";
        return $this->db->query($sql);
    }
}