<?php
namespace App\models;
interface IDB
{
    const BD_ERROR = 12;

    /**
    public function find($sql);

    /**
     * @param $sql
     * @return mixed
     */
    public function findAll($sql);

    /**
     * Всех записей
     *
     * @param $sql
     * @return mixed
     */
    public function testFindAll($sql);
}
