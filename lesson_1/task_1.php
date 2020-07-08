<?php

/* Класс Promo описывает акции Интернет-магазина */

/* Свойство $name           - название акции        */
/* Свойство $duration       - срок действия акции   */
/* Свойство $banner         - логотип акции         */
/* Свойство $description    - описание акции        */
/* Свойство $discount       - скидка                */

/* Свойства $name, $duration, $banner и $description описаны с модификатором private        */
/* Доступ к этим свойствам осуществляется через публичные методы getName() и getDuration()  */

/* Свойство $discount описано с модификатором protected     */
/* Это свойство доступно в классе-наследнике promoProduct   */

/* Публичный метод getName() позволяет получить название акции          */
/* Публичный метод getDuraton() позволяет получить срок действия акции  */

  class Promo {

    private $name = "До -30 % на классическую коллекцию";
    private $duration = "Акция действует до 30 июля";
    private $banner = "images/pic1.jpg";
    private $description = "При покупке от трёх изделий";

    protected $discount = 30;

    public function getName() { echo $this->name . "<br>"; }
    public function getDuration() { echo $this->duration . "<br>"; }

    function __construct() {
        echo "Это конструктор основного класса!<br>";
    }
  }

/* Класс promoProduct описывает акционный товар */

/* Свойство $name - имя акционного товара   */
/* Свойство $cost - цена акционного товара  */

/* Свойства $name и $cost - являются закрытыми и объявлены с модификатором private  */

/* Функция getPromoCost() вычисляет акционную цену товара и является публичной      */
/* Функция getPromoCost() использует закрытое свойство $name класса-наследника      */
/* и защищённое свойство $discount базового класса                                  */

  class promoProduct extends Promo {

    private $name;
    private $cost;
    
    public function getPromoCost() {

        $promoCost = $this->cost * (100 - $this->discount) / 100;
        echo $this->name . ": " . $promoCost . " рублей<br>";
    }

    function __construct($name, $cost) {
        $this->name = $name;
        $this->cost = $cost;
    }
  }

  $promoProd_1 = new promoProduct("Рубашка", 120);
  $promoProd_1->getPromoCost();

  $promoProd_2 = new promoProduct("Брюки", 160);
  $promoProd_2->getPromoCost();

?>