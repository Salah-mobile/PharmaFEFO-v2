<?php
namespace controllers\web;
use Repository\AuthRepo;
class authController{
    private $repoAuth;
    function __construct(){
     $this->repoAuth=new AuthRepo();    
    }
    public function login(){
        if($_SERVER["REQUEST_METHOD"]=="POST"){
               $email=$_POST["email"];
               $password=$_POST["password"];
               if(empty($email) || empty($password)){
                header("Location:/PharmaFEFO-v2/public/index.php?action=login");
                exit();
               }else{
                $login=$this->repoAuth->connectAcc($email,$password);
                if($login){
                    session_start();
                    $_SESSION["user"]=$login;
                     header("Location:/PharmaFEFO-v2/public/index.php?action=daschbord");
                     exit();
                }else{
                    header("Location:/PharmaFEFO-v2/public/index.php?action=login");
                     exit();
                }

               }
        }
        require __DIR__."/../../../templates/authPage.php";
    }
}