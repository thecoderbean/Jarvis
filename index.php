<?php
// Simple router for MVC
$route = $_GET['route'] ?? '';

if ($route === 'contact/submit') {
    require_once 'controllers/ContactController.php';
    $controller = new ContactController();
    $controller->submit();
} else {
    // Default: Load main view
    require_once 'views/index.php';
}
?>