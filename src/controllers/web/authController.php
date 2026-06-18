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
                header("Location:../../../public/index.php?action=login");
                exit();
               }else{
                $login=$this->repoAuth->connectAcc($email,$password);
                if($login){
                     header("Location:../../../public/index.php?action=daschbord");
                     exit();
                }else{
                    header("Location:../../../public/index.php?action=login");
                     exit();
                }

               }
        }
        require __DIR__."/../../../templates/authPage.php";
    }
}