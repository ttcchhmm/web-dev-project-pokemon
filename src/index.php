<?php

declare(strict_types = 1);
namespace PokeWeb;

spl_autoload_register(function (string $class) {
    $parts = explode("\\", $class);
    array_shift($parts);
    
    require implode('/', $parts) . '.php';
});

use PokeWeb\Controllers\HomeController;
use PokeWeb\Controllers\ErrorController;

const routes = [
    'home' => new HomeController(),
];

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

$content = '';
$found = false;
$errorController = new ErrorController();
foreach(routes as $name => $controller) {
    if($name === $targetController) {
        $found = true;
        
        try {
            $content = $controller->render($action, $id);
        } catch(\Exception $exception) {
            $content = $errorController->render('', '');
        }

        break;
    }
}

if(!$found) {
    $content = $errorController->render('404', '');
}

require_once('./Views/Template.php');