<?php
namespace controllers\web;
class DashboardWeb{
    function index(){
         if(!isset($_SESSION["user"])){
            header("Location:/PharmaFEFO-v2/public/index.php?action=login");
            exit();
        }else{
            require __DIR__."/../../../templates/dachbord.php";
        }
    }
}