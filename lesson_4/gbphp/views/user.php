<?php
/** @var \App\models\User $user */
?>

<h1>Пользователь</h1>

<form action="../services/apply.php?id=<?=$_GET['id']?>" method="post">

    <p>Имя: </p><input type="text" name="fio" value="<?= $user->fio ?>">
    <p>Логин: </p><input type="text" name="login" value="<?= $user->login ?>">
    <input style="display: none;" type="text" name="class" value="user">

    <input type="submit" value="Применить">

</form>

<user :user="<?= $user ?>"></user>
