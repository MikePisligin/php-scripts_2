<?php
/** @var \App\models\User $user */
?>

<h1><?= $good->name ?></h1>

<form action="../services/apply.php" method="post">

<p>Артикул: </p><input type="text" name="id" value="<?= $good->id ?>">
<p>Наименование товара: </p><input type="text" name="name" value="<?= $good->name ?>">
<p>Цена товара: </p><input type="text" name="price" value="<?= $good->price ?>">
<p>Дополнительная информация: </p><input type="text" name="info" value="<?= $good->info ?>">
<input style="display: none;" type="text" name="class" value="good">

<input type="submit" value="Применить">

</form>

<user :user="<?= $user ?>"></user>