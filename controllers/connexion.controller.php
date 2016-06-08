<?php
/**
 * Created by PhpStorm.
 * User: DEV
 * Date: 02/05/2016
 * Author: Anis Magdouli
 */

class  ConnexionController extends Controller{

    public function __construct($data = array())
    {
        parent::__construct($data);
        $this->model = new  Connexion();
    }
    public function index(){
        Config::set("page_title","Connexion");
        if (isset($_SESSION['user']))
        {
            flash( 'errors', "L'utilisateur est déja connécté", 'success' );
            header('Location:' . URL_SITE);
        }
        else{
            if (isset($_POST)){
                //print_r($_POST);
                if (!empty($_POST)){
                    $user =  $this->model ->verif_login($_POST['login'],$_POST['pwd']);
                    if (sizeof($user) > 0)
                    {
                        Session::setSessionUser($user);
                        Session::setFlash("C'est le message flash");
                        flash( 'errors', "Connexion ok", 'success' );
                        header("location:" . URL_SITE);
                    }
                    else{
                        flash( 'errors', "Erreur de connexion Login ou mot de passe incorrecte", 'warning' );
                    }
                }
            }
        }
    }

    public function logout(){
        Session::setFlash("Logout ok");
        flash( 'errors', "Logout  ok", 'success' );
        if(isset($_SESSION['user'])){
            session_unset();
            session_destroy();
            header("location:" . URL_SITE."connexion");
            exit();
        }else{
            session_unset();
            session_destroy();
            header("location:" . URL_SITE."connexion");
            exit();
        }
    }
    
}