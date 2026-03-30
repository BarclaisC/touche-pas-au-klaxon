<?php
declare(strict_types=1);

session_start();

require_once __DIR__ . '/../Config/config.php';
require_once __DIR__ . '/../Core/Database.php';

// Autoload simple
spl_autoload_register(function ($class) {
    $paths = ['../App/controllers/', '../App/models/'];
    foreach ($paths as $path) {
        $file = __DIR__ . '/' . $path . $class . '.php';
        if (file_exists($file)) {
            require_once $file;
            return;
        }
    }
});

// Routing basique
$controller = $_GET['c'] ?? 'trajet';
$action     = $_GET['a'] ?? 'index';

$controllerClass = ucfirst($controller) . 'Controller';

if (!class_exists($controllerClass)) {
    die("Contrôleur introuvable");
}

$ctrl = new $controllerClass();

if (!method_exists($ctrl, $action)) {
    die("Action introuvable");
}

$ctrl->$action();