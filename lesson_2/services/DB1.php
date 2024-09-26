<?php
namespace App\services;
class DB1 implements \IDB
{
    public function find($sql)
    {
        return $this->prepareSql($sql) . ' find';
    }

    public function findAll($sql)
    {
        return $this->prepareSql($sql) . ' findAll';
    }

    protected function prepareSql($sql)
    {
        return $sql;
    }

    public function getSumm($a, $b)
    {
        // TODO: Implement getSumm() method.
    }
}