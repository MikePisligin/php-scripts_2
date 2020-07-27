<?php
/**
 * @var \App\models\Good[] $users
 */
?>

<h1>Товары</h1>
<?php foreach ($goods as $good) :?>
    <p>
        <a href="/gbphp/publc/index.php?c=good&a=one&id=<?= $good->id ?>&o=0&l=10">
            <?= $good->name ?>
        </a>
    </p>
<?php endforeach;?>
<div class="pager">
    <span>Страницы каталога товаров: </span>
    <a href="/gbphp/publc/index.php?c=good&a=all&o=0&l=10">1</a>
    <a href="/gbphp/publc/index.php?c=good&a=all&o=10&l=10">2</a>
    <a href="/gbphp/publc/index.php?c=good&a=all&o=20&l=10">3</a>
    <a href="/gbphp/publc/index.php?c=good&a=all&o=30&l=10">4</a>
</div>