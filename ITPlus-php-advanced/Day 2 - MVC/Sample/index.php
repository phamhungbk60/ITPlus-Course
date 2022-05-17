<?php

//index.php?controller=user&action=index
//UserController
//ucfirst: user => UserController
$controller = isset($_GET['controller']) ? ucfirst($_GET['controller']) . 'Controller' : 'DefaultController';
//index.php?controller=user&action=index => UserController
$action = isset($_GET['action']) ? $_GET['action'] : 'index';
//index

//require('./controllers/UserController.php')
require("./controllers/$controller.php");

//$controllerInstance = new UserController()
$controllerInstance = new $controller();

//$controllerInstance->index()
echo $controllerInstance->$action();