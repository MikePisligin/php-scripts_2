<?php
namespace App\services;
class DB implements IDB, ITest
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
