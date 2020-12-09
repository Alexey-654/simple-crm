<?php
$this->title = 'View Deal Card';
?>

<h1 class="h2">View Deal Card</h1>
<i>Форматирование карточки на будущее</i>
<div class="row my-4">
    <div class="col col-lg-4">
        <h2 class="h4">Сделка</h2>
        <ul class="list-group">
        <?php foreach ($deal as $key => $value) : ?>
            <li class="list-group-item list-group-item-action"><?= $key . ' - ' . $value ?></li>
        <?php endforeach; ?>
        </ul>
    </div>

    <div class="col col-lg-4">
        <h2 class="h4">Контрагент</h2>
        <ul class="list-group">
        <?php foreach ($customer as $key => $value) : ?>
            <li class="list-group-item list-group-item-action"><?= $key . ' - ' . $value ?></li>
        <?php endforeach; ?>
        </ul>
    </div>

    <div class="col col-lg-4">
        <h2 class="h4">Продукт</h2>
        <ul class="list-group">
        <?php foreach ($product as $key => $value) : ?>
            <li class="list-group-item list-group-item-action"><?= $key . ' - ' . $value ?></li>
        <?php endforeach; ?>
        </ul>
    </div>
</div>
