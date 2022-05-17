<?php
die('1');
$controller = isset($_GET['controller']) ? ucfirst($_GET['controller']) : 'Default';

$action = isset($_GET['action']) ? $_GET['action'] : 'index';

$controllerName = sprintf("%sController", $controller);

/**
 * __DIR__ sẽ trả về địa chỉ đường dẫn hiện tại ở đây của mình là
 * Volumes/Day2-MVC/Demo/[index.php] <== file hiện tại
 */ 
$directory = __DIR__."/controllers/{$controllerName}.php";

if (!file_exists($directory)) {
    die("Controller file is not exist");
}

require($directory);

$controllerInstance = new $controllerName();

echo $controllerInstance->$action();