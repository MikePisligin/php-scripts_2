<?php

namespace App\controllers;

use App\models\Good;

class GoodController extends Controller {

    public function run($action, $o, $l)
    {
        $this->action = $action;
        
        if (empty($this->action)) {
            $this->action = $this->actionDefault;
        }

        $method = $this->action . "Action";
        if (!method_exists($this, $method)) {
            return 'Error';
        }
        
        if($method == 'allAction') {
            return $this->$method($o, $l);
        } else {
            return $this->$method();
        }
        
    }

    public function allAction($o, $l)
    {
        return $this->render(
            'goods',
            [
                'goods' => Good::getAll($o, $l),
            ]
        );
    }

    public function oneAction()
    {
        $id = $this->getId();
        return $this->render(
            'good',
            [
                'good' => Good::getOne($id),
            ]
        );
    }

}

?>