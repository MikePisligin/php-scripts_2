<?php

namespace App\controllers;

use App\models\Good;
use App\models\User;

abstract class Controller {

    protected $action;
    protected $actionDefault = 'all';

    abstract protected function oneAction();

    protected function getId()
    {
        $id = 0;
        if (!empty((int)$_GET['id'])) {
            $id = (int)$_GET['id'];
        }

        return $id;
    }

    public function render($template, $params = [])
    {
        $content = $this->rendererTmpl($template, $params);

        return $this->rendererTmpl(
            'layouts/main',
            [
                'content' => $content
            ]
        );
    }

    public function rendererTmpl($template, $params = [])
    {
        ob_start();
        extract($params);
        include dirname(__DIR__) . '/views/' . $template . '.php';
        return ob_get_clean();
    }
}

?>