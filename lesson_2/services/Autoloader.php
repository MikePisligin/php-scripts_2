<?php
namespace App\services;
class Autoloader
{
    private $dirs = [
        'models', 'services'
    ];

    public function loadClass($className)
    {
        $className = explode("\\", $className);
        $className = $className[count($className) - 1];
        foreach ($this->dirs as $dir) {
            $file = dirname(__DIR__) . '/' . $dir . '/' . $className . '.php';
            if (is_file($file)) {
                include $file;
                break;
            }
        }
    }
}