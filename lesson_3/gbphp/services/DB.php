<?php
namespace App\services;

use App\traits\TSingleton;

class DB
{
    use TSingleton;

    protected $connect;

    protected $config = [
        'driver' =>  'mysql',
        'host' =>  '172.18.0.2',
        'dbname' =>  'gbphp',
        'charset' =>  'UTF8',
        'user' => 'mike',
        'password' => '124356+A'
    ];

    protected function getConnect()
    {
        if (empty($this->connect)) {
            $this->connect = new \PDO(
                $this->getPrepareDsnString(),
                $this->config['user'],
                $this->config['password']
            );
            $this->connect->setAttribute(
                \PDO::ATTR_DEFAULT_FETCH_MODE,
                \PDO::FETCH_CLASS
            );
        }
        return $this->connect;
    }

    private function getPrepareDsnString()
    {
        return sprintf(
            "%s:host=%s;dbname=%s;charset=%s",
            $this->config['driver'],
            $this->config['host'],
            $this->config['dbname'],
            $this->config['charset']
        );
    }

    /**
     * @param $sql
     * @param array $params
     * @return bool|\PDOStatement
     */
    protected function query($sql, $params = [])
    {
        $PDOStatement = $this->getConnect()->prepare($sql);
        $PDOStatement->execute($params);
        return $PDOStatement;
    }

    public function find($sql, $params = [], $classname)
    {
        $o = $this->query($sql, $params);
        $o->setFetchMode(\PDO::FETCH_CLASS, $classname);
        
        return $o->fetch();
    }

    public function findAll($sql, $params = [])
    {
        return $this->query($sql, $params)->fetchAll(\PDO::FETCH_ASSOC);
    }

    /**
     * @param $sql
     * @param array $params
     * @return bool|\PDOStatement
     */
    public function execute($sql, $params = [])
    {
        return $this->query($sql, $params);
    }
}
