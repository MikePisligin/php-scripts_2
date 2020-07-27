<?php
use App\services\Autoloader;

include dirname(__DIR__) . '/services/Autoloader.php';
spl_autoload_register([(new Autoloader()), 'loadClass']);

$str = 'App\models\\' . ucfirst($_POST['class']);

    $o = new $str();
    
    if ($_POST['class'] == 'user') {

        $o->id=$_GET['id'];
        $o->fio=$_POST['fio'];
        $o->login=$_POST['login'];
    } else if ($_POST['class'] == 'good') {

        $o->id=$_POST['id'];
        $o->name=$_POST['name'];
        $o->price=$_POST['price'];
        $o->info=$_POST['info'];
    }

    echo $_POST['class'];
    $o->save();
    header('Location: /gbphp/publc/index.php?c=' . $_POST['class'] . '&a=one&id=' . $o->id);

?>