<?php
/**
 * @var \App\models\User[] $users
 */
?>

<h1>Пользователи</h1>
<?php foreach ($users as $user) :?>
    <p>
        <a href="/gbphp/publc/index.php?c=user&a=one&id=<?= $user->id ?>&o=0&l=10">
            <?= $user->fio ?>
        </a>
    </p>
<?php endforeach;?>
