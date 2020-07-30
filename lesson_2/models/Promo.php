<?php

/* Модель Promo описывает акции магазина */

/* Свойства модели Promo:                           */
/*      $name - название акции;                     */
/*      $duration - срок действия акции;            */
/*      $info - дополнительная информация об акции. */

namespace App\models;
class Promo extends Model {

    public $name;
    public $duration;
    public $info;

    public function getTableName(): string {
        return 'promos';
    }
}

?>