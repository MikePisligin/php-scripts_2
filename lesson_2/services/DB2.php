<?php
namespace App\services;

require_once 'IDB.php';
use App\models\IDB;

class DB2 implements IDB, \ITest
{
    public function find($sql)
    {
        return 'find ' . $sql;
    }

    public function findAll($sql)
    {
        return 'findAll ' . $sql;
    }

    public function testFindAll($sql)
    {
        // TODO: Implement testFindAll() method.
    }
}
