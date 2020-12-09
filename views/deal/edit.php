<?php

use yii\helpers\Html;
use yii\bootstrap4\ActiveForm;

$this->title = 'Edit Product Card';
?>

<h1 class="h2">Edit Product Card</h1>
<i>Форматирование карточки на будущее</i>
<div class="row my-4">
    <div class="col col-lg-4">
        <?php $form = ActiveForm::begin(['action' => '/deal/update']); ?>
            <?= $form->field($deal, 'id')->hiddenInput()->label(false); ?>
            <?= $form->field($deal, 'quantity')->textInput(['type' => 'number'])->label('Количество') ?>
            <?= $form->field($deal, 'business_status')
                    ->dropdownList(
                        [
                            "Холодный клиент" => "Холодный клиент",
                            "Теплый клиент" => "Теплый клиент",
                            "Горячий клиент" => "Горячий клиент",
                            "Сделка закрыта" => "Сделка закрыта",
                            "Сделка проваленна" => "Сделка проваленна",
                        ]
                    )
                    ->label('Статус')
            ?>
            <div class="form-group">
                <?= Html::submitButton('Отправить', ['class' => 'btn btn-primary']) ?>
            </div>
        <?php ActiveForm::end(); ?>
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