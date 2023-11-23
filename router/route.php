<?php
$route = isset($_GET["action"]) ? $_GET["action"] : "home";





switch ($route) {
    case "concorde":
        require_once "./controller/concordeController.php";

        $contact = new concordeController;
        $views = $contact->index();
        break;

    case "admin":
        require_once "./controller/adminController.php";
        $contact = new adminController;
        $views = $contact->index();

        break;
    default:
        break;
}
