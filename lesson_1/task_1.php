<?php

/* Класс Fruit описывает товар Фрукт для интернет-магазина */
/******************************************************************************
Свойствами класса Fruit являются:
			- $name - название фрукта; 
			- $image - имя файла с изображением фрукта;
			- $pathToImage - путь до файла с изображением фрукта;  
			- $price - цена за 1 кг, в рублях;
			- $quantityToStock - количество на складе, в кг.

Методами класса Fruit являются:
			- toPrice() - получить название цены; 
			- toQuantity() - получить количество товара на складе.
*******************************************************************************/
 class Fruit
{

 public $name;
 public $image;
 public $pathToImage;
 public $price;
 public $quantityToStock;

 function __construct ($name, $image, $path) {

  $this->name = $name;
  $this->image = $image;
  $this->pathToImage = $path;

 }

 function toPrice() { echo $this->price . '<br>'; }

 function toQuantity() { echo $this->quantityToStock; }

}

/* Класс kindOfFruit описывает сорт того или иного фрукта */
/* Предполагается, что интернет-магазин торгует несколькими сортами фруктов */
/* Например, класс Fruit описывает фрукт Яблоко,
       а класс kindOfFruit описывает сорта яблок, продаваемых в магазине
				(Антоновка, Айдаред, Голден Раш, Гренни Смит).
   Например, класс Fruit описывает фрукт Груша,
       а класс kindOfFruit описывает сорта груш, продаваемых в магазине
					(Дюшес, Вильямс, Пакхамс, Конференц)*/
/******************************************************************************
Свойствами класса kindOfFruit являются:
	- $name - название сорта;
	- свойства $image, $pathToImage, $price, $quantityToStock
		наследуются от класса Fruit. Их необходимо заполнить вручную,
						после создания экземпляра класса.
Методами класса kindOfFruit являются:
			- toPrice() - получить название цены кг яблок
								конкретного сорта; 
			- toQuantity() - получить количество товара на складе.
*******************************************************************************/
 class kindOfFruit extends fruit {

 public $nameKind;

 function __construct ($nameKind) { $this->nameKind = $nameKind; }

}
// создаём объект класса Fruit с именем f
$f = new Fruit ("Apple", "apple.jpg", "images/");

// создаём объект класса kindOfFruit с именем f1
$f1 = new kindOfFruit ("Macintosh");

// определяем свойства для объекта $f1
$f1->image = 'apple.jpg';
$f1->pathToImage = 'images/';

/* Для свойства price объекта f1 класса kindOfFruit задано значение 100 рублей,
	это означает, что одноимённое свойство из класса Fruit будет затенено этим
 	  								   свойством.
Аналогично, свойство quantityToStock, то есть количество товара на складе.
			Для объекта f это количество яблок на складе всех сортов;
				для f1 - количество яблок на складен сорта Макинтош. */
$f1->price = 100;
$f1->quantityToStock = 200;


$f->toPrice();
$f1->toPrice();

?>
