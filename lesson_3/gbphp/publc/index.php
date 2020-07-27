<?php
use App\services\Autoloader;
use App\services\DB;
use App\models\Good;
use App\models\User;

include dirname(__DIR__) . '/services/Autoloader.php';
spl_autoload_register([(new Autoloader()), 'loadClass']);


$good = new Good();
$good->save();
var_dump($good->getOne(2));
var_dump($good->getAll());


$user = new User();
$user->name = 'name!';
$user->login = 'login!';
$user->password = 'password!';
$user->save();




