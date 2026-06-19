<?php
require_once "../src/config/autoloder.php";
use  controllers\web\authController;
use controllers\api\ApiDashboardController;
$controllerAuth=new authController();
$dachbordController=new ApiDashboardController();
$action = $_GET["action"] ?? "login";
switch ($action) {
    case 'login':
        $controllerAuth->login();
        break;
    case "daschbord";
        $dachbordController->index();
        break;
    default:
        # code...
        break;
}