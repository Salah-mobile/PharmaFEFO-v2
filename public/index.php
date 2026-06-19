<?php
require_once "../src/config/autoloder.php";
use  controllers\web\authController;
use controllers\api\ApiDashboardController;
use controllers\web\DashboardWeb;
$controllerAuth=new authController();
$dachbordController=new ApiDashboardController();
$dachbordControllerWeb=new DashboardWeb();
$action = $_GET["action"] ?? "login";
switch ($action) {
    case 'login':
        $controllerAuth->login();
        break;
    case "api/daschbord";
        $dachbordController->index();
        break;
    case "daschbordData";
        $dachbordController->index();
        break;
    case "daschbord";
        $dachbordControllerWeb->index();
        break;
    default:
        # code...
        break;
}
