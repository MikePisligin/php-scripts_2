<?php
use App\services\Autoloader as Autoloader;

include dirname(__DIR__) . '/services/Autoloader.php';
$o = new Autoloader;
spl_autoload_register([$o,'loadClass']);

$db = new \App\services\DB();

$good = new \App\models\Good($db);

echo $good->getOne(12);
echo $good->getAll();

$good = new \App\models\User($db);

echo $good->getOne(20);
echo $good->getAll();

$good = new \App\models\Promo($db);

echo $good->getOne(15);
echo $good->getAll();

$good = new \App\models\Shops($db);

echo $good->getOne(5);
echo $good->getAll();