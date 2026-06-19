<?php
namespace controllers\api;
use Repository\stockRep;
session_start();
class ApiDashboardController{
    private $repoStock;
    public function __construct(){
        $this->repoStock=new stockRep();
    }
    public function index(){
        if(!isset($_SESSION["user"])){
            header("Location:/PharmaFEFO-v2/public/index.php?action=login");
            exit();
        }else{
            $userInfo=$_SESSION["user"];
            var_dump($userInfo);
            require __DIR__."/../../../templates/dachbord.php";
        }

    }
}