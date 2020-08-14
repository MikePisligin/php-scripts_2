<?php
use App\services\Autoloader;
use App\services\RendererTmplServices;

include dirname(__DIR__) . '/services/Autoloader.php'; //удалить
spl_autoload_register([(new Autoloader()), 'loadClass']);//удалить
require_once dirname(__DIR__) . '/vendor/autoload.php';

$controller = 'user';
if ($_GET['c']) {
    $controller = $_GET['c'];
}

$action = '';
if (!empty($_GET['a'])) {
    $action = $_GET['a'];
}

$controllerName = 'App\\controllers\\' . ucfirst($controller) . 'Controller';

if (class_exists($controllerName)) {
    /** @var \App\controllers\UserController $realController */
    $realController = new $controllerName(new TwigRendererServices());
    $content = $realController->run($action);
    if (!empty($content)) {
        echo $content;
    }
}



