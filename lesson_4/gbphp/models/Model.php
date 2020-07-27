<?php
namespace App\models;

use App\services\DB;

abstract class Model
{

    /**
     * Возвращает название таблицы
     *
     * @return string
     */
    abstract public static function getTableName(): string;

    /**
     * @return DB
     */
    protected static function getDB()
    {
        return DB::getInstance();
    }

    public static function getOne($id)
    {
        $sql = 'SELECT * FROM ' . static::getTableName() . ' WHERE id = :id';
        return static::getDB()->findObject($sql, static::class, [':id' => $id]);
    }

    public function delete()
    {
        $sql = 'DELETE FROM ' . $this->getTableName() . ' WHERE id = :id';
        // echo $sql;
        $id = $this->id;
        static::getDB()->execute($sql, [':id' => $id]);
    }

    public function insert()
    {
        $columns = [];
        $params = [];

        foreach ($this as $key => $value) {
            if ($key == 'id' || empty($value)) {
                continue;
            }

            $columns[] = $key;
            $params[':' . $key] = $value;
        }

        $sql = sprintf(
            "INSERT INTO %s (%s) VALUES (%s)",
            static::getTableName(),
            implode(',', $columns),
            implode(',', array_keys($params))
        );

        static::getDB()->execute($sql, $params);
        $this->id = static::getDB()->getInsertId();
    }

    protected function update()
    {
        $columns = [];
        $sql = 'UPDATE ' . $this->getTableName() . ' SET ';

        foreach ($this as $key => $value) {
            if ($key == 'id' || $key == 'password' || $key == 'db') { continue; }

            $columns[] = $key . "=\"" . $value . "\"";
        }

        $columns = implode(",", $columns);
        $sql = $sql . $columns . ' WHERE id = :id';

        // echo $sql;
        $id = $this->id;
        static::getDB()->execute($sql, [':id' => $id]);
    }

    public function save()
    {
        if(empty($this->id)) {
            return $this->insert();
        }
        return $this->update();
    }
}