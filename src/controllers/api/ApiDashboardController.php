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
            $products=$this->repoStock->getAllProduct();
            $permis=$this->repoStock->getPerimiProduct();
            $data = [
                "products" => $products,
                "expired" => $permis
            ];
            echo json_encode($data);
        }

    }
}