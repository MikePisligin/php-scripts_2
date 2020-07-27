<?php

namespace App\models;

class Good extends Model
{
    public $id;
    public $name;
    public $price;
    public $info;

    public static function getTableName(): string
    {
        return 'goods';
    }

    public static function getAll($o, $l)
    {
        $sql = 'SELECT * FROM ' . static::getTableName() . ' LIMIT ' . $o . ',' . $l;
        return static::getDB()->findObjects($sql, static::class);
    }

//    public function getCategory()
//    {
//        $sql = '';
//        static::getDB()->findObject($sql, Category::class);
//    }
}
