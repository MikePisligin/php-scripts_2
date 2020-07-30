<?php
namespace App\models;

class User extends Model
{
    public $id;
    public $fio;
    public $login;
    public $password;

    public static function getTableName(): string
    {
        return 'users';
    }

    public function __toString()
    {
        return '123123';
    }

    public static function getAll()
    {
        $sql = 'SELECT * FROM ' . static::getTableName();
        return static::getDB()->findObjects($sql, static::class);
    }
    
}