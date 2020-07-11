<?php
namespace App\services;
class DB implements \IDB
{
    use \TTest;

    public function find($sql)
    {
        return $sql . ' find<br>';
    }

    public function findAll($sql)
    {
        return $sql . ' findAll<br>';
    }

}