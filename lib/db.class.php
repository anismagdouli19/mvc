<?php
/**
 * Created by PhpStorm.
 * User: DEV
 * Date: 02/05/2016
 * Author: Anis Magdouli
 */



class DB{
    protected $connection;
    public function  __construct($host,$user,$pass,$db_name)
    {
        try{
            $this->connection = new PDO('mysql:host=127.0.0.1;dbname=mvc','root','');
        }
        catch (PDOException $e) {
            //flash("errors","Une erreur est survenue","danger");
            header("location: "."error/errorin/");
        }
        //echo "DB called";
        /*
        $this->connection = new mysqli($host,$user,$pass,$db_name);

        if (mysqli_connect_errno()){
            header("location: "."error/errorin/");
        }*/
    }
    public function query($sql){
        if (!$this->connection)
        {
            return false;
        }
        $result = $this->connection->prepare($sql);
        $result->execute();
        $row = $result->fetchAll(PDO::FETCH_ASSOC);
        /*if (mysqli_errno($this->connection)){
            throw new Exception (mysqli_errno($this->connection));
        }
        if (is_bool($result)){
         return $result;
        }

        $data = array();

        while ($row = mysqli_fetch_row($result)){
            var_dump($row);
            $data [] = $row;
        }
        return $data;
        */
        return $row;


    }
    public function  escape($str){
        return mysql_escape_string($this->connection,$str);
    }

}