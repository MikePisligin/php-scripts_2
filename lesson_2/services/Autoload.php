<?php

class Autoload
{
    private $dirs = [
        'models', 'services'
    ];

    public function loadClass($className)
    {
	/* Функцией explode мы разбиваем строку с именем класса
					на массив слов по разделителю \ */
	/* Это необходимо сделать, так как в функцию автозагрузки
		    передаётся имя класса с префиксом пространства имён */
        $className = explode('\\', $className);
	/* Функция array_pop принимает в качестве аргумента массив и возвращает
		    значение последнего элемента */
        $className = array_pop($className);
        foreach ($this->dirs as $dir) {
            $file = dirname(__DIR__) . "/{$dir}/{$className}.php";

            if (file_exists($file)) {
                include $file;
                break;
            }
        }
    }
}
