<?php
require_once "../src/config/autoloder.php";
use  controllers\web\authController;
$controllerAuth=new authController();
$action = $_GET["action"] ?? "login";
switch ($action) {
    case 'login':
        $controllerAuth->login();
        break;
    case "daschbord";
    break;
    default:
        # code...
        break;
}