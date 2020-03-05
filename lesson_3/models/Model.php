<?php
namespace App\models;

use App\services\DB;

/**
 * Class Model
 */
abstract class Model
{

    /**
     * @var DB
     */
    protected $db;

    abstract protected function getTableName():string ;

    /**
     * Model constructor.
     */
    public function __construct()
    {
        $this->db = DB::getInstance();
    }

    public function getOne($id)
    {
        $sql = "SELECT * FROM {$this->getTableName()} WHERE id = :id";
	return $this->db->find($sql, get_called_class(), [':id' => $id]);
    }

    public function getAll()
    {
        $sql = "SELECT * FROM {$this->getTableName()}";
	return $this->db->findAll($sql, get_called_class());
    }

    public function insert()
    {
	$tableCol = array();	
	$tableVal = array();
	
	
	$this->name = 'Persimmon';
	$this->path = 'images/';
	$this->name_file = 'persimmon.jpg';
	$this->price = '40';
	$this->quantity = '95';
	$this->description = 'description';


        foreach ($this as $key => $value) {
            
	    if ($key == 'db' ) {
	     break;
	   }
	
	$value = '\'' . $value . '\'';
	array_push($tableCol, $key);
	array_push($tableVal, $value);

	    
        }
        $str1 = implode(', ', $tableCol);
        $str2 = implode(', ', $tableVal);
	
	$sql = "INSERT INTO {$this->getTableName()} ({$str1}) VALUES ({$str2})";
	$this->db->execute($sql);

    }

    public function update($id, $newCol, $newValue)
    {

	/*$tableCol = array();	
	$tableVal = array();
	
	$this->id = 13;
	$this->name = 'Persimmon';
	$this->path = 'images/';
	$this->name_file = 'persimmon.jpg';
	$this->price = '40';
	$this->quantity = '95';
	$this->description = 'description';


        foreach ($this as $key => $value) {

	if ($key == 'db' ) { break; }

	$value = '\'' . $value . '\'';
	array_push($tableCol, $key);
	array_push($tableVal, $value);

	    
        }
        $str1 = implode(', ', $tableCol);
        $str2 = implode(', ', $tableVal);*/
	

	/* Ключевое слово ON DUPLICATE KEY UPDATE обновляет существующую запись, */
	/* если запись по уникальному полю не найдена, то обновляется значение в столбце $newCol. */

	// $sql = "INSERT INTO {$this->getTableName()} ({$str1}) VALUES ({$str2}) ON DUPLICATE KEY UPDATE {$newCol} = '{$newValue}'";
	$sql = "UPDATE {$this->getTableName()} SET {$newCol} = '{$newValue}' WHERE id = {$id} ";
	$this->db->execute($sql);
    }

    public function delete()
    {
        $sql = "DELETE FROM {$this->getTableName()} WHERE id = :id";
        $this->db->execute($sql, [':id' => $this->id]);
    }

    public function save()
    {
        if (!$this->id) {
            $this->insert();
            return;
        }

        $this->update();
    }
}
