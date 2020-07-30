<?php
namespace App\models;

use App\services\DB;

abstract class Model
{
    /**
     * @var DB
     */
    protected $db;

    /**
     * Возвращает название таблицы
     *
     * @return string
     */
    abstract public function getTableName(): string;

    /**
     * Model constructor.
     */
    public function __construct()
    {
        $this->db = DB::getInstance();
    }

    public function getOne($id)
    {
        // echo get_class($this);
        $sql = 'SELECT * FROM ' . $this->getTableName() . ' WHERE id = :id';
        return $this->db->find($sql, [':id' => $id], get_class($this));
    }

    public function getAll()
    {
        $sql = 'SELECT * FROM ' . $this->getTableName() ;
        return $this->db->findAll($sql);
    }

    public function delete()
    {
        $sql = 'DELETE FROM ' . $this->getTableName() . ' WHERE id = :id';
        // echo $sql;
        $id = $this->id;
        $this->db->execute($sql, [':id' => $id]);
    }

    protected function insert()
    {
        $sql = 'INSERT INTO ' . $this->getTableName() . '(';
        $params = [];
        $columns = [];
        $values = [];

        foreach ($this as $key => $value) {
            if ($key == 'id') { continue; }
            if ($key == 'db') { break; }

            $columns[] = $key;
            $values[] = $value;
        }

        $strColumns = implode(",", $columns);
        $strValues = '"' . implode("\",\"", $values) . '"';

        $sql = $sql . $strColumns . ') VALUES (' . $strValues . ")";
        $this->db->execute($sql, $params);
    }

    protected function update()
    {
        $columns = [];
        $sql = 'UPDATE ' . $this->getTableName() . ' SET ';

        foreach ($this as $key => $value) {
            if ($key == 'id') { continue; }
            if ($key == 'db') { break; }

            $columns[] = $key . "=\"" . $value . "\"";
        }

        $columns = implode(",", $columns);
        $sql = $sql . $columns . ' WHERE id = :id';

        // echo $sql;
        $id = $this->id;
        $this->db->execute($sql, [':id' => $id]);
    }

    public function save()
    {
        if(empty($this->id)) {
            return $this->insert();
        }
        return $this->update();
    }
}