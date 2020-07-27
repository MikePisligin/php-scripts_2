<?php

namespace App\controllers;

use App\models\User;

class UserController extends Controller
{

    public function run($action)
    {
        $this->action = $action;
        if (empty($this->action)) {
            $this->action = $this->actionDefault;
        }

        $method = $this->action . "Action";
        if (!method_exists($this, $method)) {
            return 'Error';
        }
        
        return $this->$method();

    }

    public function allAction()
    {
        return $this->render(
            'users',
            [
                'users' => User::getAll(),
            ]
        );
    }

    public function oneAction()
    {
        $id = $this->getId();
        return $this->render(
            'user',
            [
                'user' => User::getOne($id),
            ]
        );
    }


}