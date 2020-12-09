<?php
$this->title = 'View Product Card';
?>

<h1 class="h2">View Product Card</h1>
<i>Форматирование карточки на будущее</i>
<div class="row my-4">
    <div class="col col-lg-6">
        <ul class="list-group">
        <?php foreach ($product as $key => $value) : ?>
            <li class="list-group-item list-group-item-action"><?= $key . ' - ' . $value ?></li>
        <?php endforeach; ?>
        </ul>
    </div>
</div>