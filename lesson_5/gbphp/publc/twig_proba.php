<?php
require_once dirname(__DIR__) . "/vendor/autoload.php" ;

$loader = new \Twig\Loader\FilesystemLoader(dirname(__DIR__) . '/views/layouts/');
$twig = new \Twig\Environment($loader);

$template = $twig->load('child.twig');
echo $template->render();

?>