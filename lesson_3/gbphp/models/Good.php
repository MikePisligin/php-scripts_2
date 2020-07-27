<?php

namespace App\models;

class Good extends Model
{
    public $id = 8;
    public $name = '8';
    public $price = '800';
    public $info = "";
    public $img = "img-66df5.jpg";

    public function getTableName(): string
    {
        return 'goods';
    }
}
