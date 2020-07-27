<?php

/* Модель Shops описывает список салонов в городе                                  */
/* Наш магазин может продавать товары как через интернет, так и через сеть салонов */

/* Свойства модели Shops:                                                   */
/*      $addres - адрес салона в городе;                                    */
/*      $storeOperMode - режим работы магазина;                             */
/*      $telephone - телефон;                                               */
/*      $services - дополнительные услуги магазина, например, подшив брюк . */

namespace App\models;
class Shops extends Model {

    public $address;
    public $storeOperMode;
    public $telephone;
    public $services;

    public function getTableName(): string {
        return 'shops';
    }
}

?>