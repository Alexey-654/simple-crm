<?php

use yii\helpers\Html;
use yii\bootstrap4\ActiveForm;

$this->title = 'Edit Product Card';
?>

<h1 class="h2">Edit Product Card</h1>
<div class="row my-4">
    <div class="col col-lg-6">
        <?php $form = ActiveForm::begin(['action' => '/product/update']); ?>
                    <?= $form->field($product, 'id')->hiddenInput()->label(false); ?>
                    <?= $form->field($product, 'name')->textInput()->label('Наименование продукта/услуги') ?>
                    <?= $form->field($product, 'price')->textInput(['type' => 'number'])->label('Цена') ?>
                    <div class="form-group">
                        <?= Html::submitButton('Обновить', ['class' => 'btn btn-primary']) ?>
                    </div>
        <?php ActiveForm::end(); ?>
    </div>
</div>