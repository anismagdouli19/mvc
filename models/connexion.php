<?php
/**
 * Created by PhpStorm.
 * User: DEV
 * Date: 02/05/2016
 * Author: Anis Magdouli
 */



class Connexion  extends Model {
    //protected  $db;

    /*public  function __construct()
    {
        $this->db = App::$db;
    }*/

    public function verif_login($login,$pwd){
        $sql = "select * from users where nom = '".$login."' and mdp = '".$pwd."'";
        return $this->db->query($sql);
    }
}