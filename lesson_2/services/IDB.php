<?php

interface IDB
{
    const TEST = 'test';

    /**
     * Получение записи по Id
     *
     * @param $sql
     * @return mixed
     */
    public function find($sql);

    /**
     * Получение всех записей
     *
     * @param $sql
     * @return mixed
     */
    public function findAll($sql);

    public function getSumm($a, $b);
}
