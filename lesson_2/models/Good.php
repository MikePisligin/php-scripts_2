<?php
namespace App\models;
class Good extends Model
{
    protected function getTableName(): string
    {
         $this->calc([123,123]);
         return 'goods';
    }
}
