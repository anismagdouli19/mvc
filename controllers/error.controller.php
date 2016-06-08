<?php
/**
 * Created by PhpStorm.
 * User: DEV
 * Date: 02/05/2016
 * Author: Anis Magdouli
 */

class  ErrorController extends Controller{

    public function index(){
        flash("errors","La page que vous cherchez est introuvable","warning");
        //$this->data["erreur"] =  "La page que vous cherchez est introuvable";
        Config::set("page_title","Erreur 404");
        
    }
    public function error404(){
        $this->data["erreur"] =  "Erreur de chargement de la page";
        Config::set("page_title","Erreur");
    }
    public function errorin(){
        $this->data["erreur"] =  "Une erreur est survenue lors du chagement de la page";
        Config::set("page_title","Erreur inconnue");
    }
    public function auth(){
        $this->data["erreur"] =  "Une erreur est survenue lors du chagement de la page";
        Config::set("page_title","Erreur inconnue");
    }
    public function lang(){
        $this->data["erreur"] =  "Une erreur est survenue lors du chagement de la page";
        Config::set("page_title","Erreur");
    }
}