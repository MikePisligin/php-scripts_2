<?php
include dirname(__DIR__) . "/services/Autoload.php";
spl_autoload_register([new Autoload(), 'loadClass']);

use \App\services\DB2;
use \App\models\Good;
use \App\models\User;

$db = new DB2();
$good = new Good($db);

var_dump($good->getOne(12));
var_dump($good->getAll());

$user = new User($db);

var_dump($user->getOne(12));
var_dump($user->getAll());
var_dump($user->calc([123,123,123,123,123]));
