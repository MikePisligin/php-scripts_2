<?php

use App\services\DB;
use App\models\Good;
use App\services\Autoload;

include dirname(__DIR__) . "/services/Autoload.php";
spl_autoload_register([new Autoload(), 'loadClass']);

// var_dump((new Good())->getOne(1));
var_dump((new Good())->update(13, "name", "Persimmon"));


// var_dump((new Good())->getAll());

// $good = new Good();

//$good->setId(12);
/*$good->setPrice(120);
$good->setName('Test');
$good->setInfo('INFO');

$good->save();*/



