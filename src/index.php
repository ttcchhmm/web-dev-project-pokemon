<?php

declare(strict_types = 1);
namespace PokeWeb;

// Autoload classes by using their namespace.
spl_autoload_register(function (string $class) {
    $parts = explode("\\", $class);
    array_shift($parts);
    
    require implode('/', $parts) . '.php';
});

// Get the routes
require_once('./routes.php');

// Extract the controller/action/id combo.
$targetController = 'home';
$action = '';
$id = '';

if(isset($_GET['controller'])) {
    $targetController = $_GET['controller'];
}

if(isset($_GET['action'])) {
    $action = $_GET['action'];
}

if(isset($_GET['id'])) {
    $id = $_GET['id'];
}

// Render the page.
$response = null;
$found = false;
foreach(routes as $name => $controller) {
    if($name === $targetController) {
        $found = true;
        
        try {
            $response = $controller->render($action, $id);
        } catch(\Exception $exception) {
            $response = routes['error']->render('', '');
        }

        break;
    }
}

// If 404.
if(!$found) {
    $response = routes['error']->render('404', '');
}

if(isset($response['hideTemplate']) && $response['hideTemplate']) {
    echo $response['content'];
} else {
    require_once('./Views/Template.php');
}