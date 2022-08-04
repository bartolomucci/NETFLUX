<?php

require '../vendor/autoload.php';

spl_autoload_register(function($class)
{    
    $class = str_replace([
        '\\',
        'App/Controller/Admin',
        'App/Controller',
        'App/Manager',
        'App/Entity',
        'Core',
    ], 
    [
        '/',
        '../src/controller/admin',
        '../src/controller',
        '../src/manager',
        '../src/entity',
        '../core',
    ], $class);

    if(file_exists($class . '.php'))
    {
        require_once $class . '.php';
    }
    
});

$area = !empty($_GET['area']) ? ucfirst($_GET['area']) . '\\' : '';

if(!empty($_GET['controller']))
{
    $controller = $_GET['controller'];
}
else
{
    $controller = 'home';
}

$controllerClassName = '\\App\\Controller\\' . $area . ucfirst($controller) . 'Controller';

if(class_exists($controllerClassName))
{
    $controllerInstance = new $controllerClassName();

    if(!empty($_GET['action']))
    {
        $action = $_GET['action'];
    }
    else
    {
        $action = 'index';
    }

    if(method_exists($controllerInstance, $action))
    {
        $controllerInstance->$action();
    }
    else
    {
        echo 'Method ' . $action . ' not found in ' . $controllerClassName;
    }
}
else
{
    echo 'Controller ' . $controllerClassName . ' class not found';
}



