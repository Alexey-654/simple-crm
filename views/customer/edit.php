<?php

use yii\helpers\Html;
use yii\bootstrap4\ActiveForm;

$this->title = 'Edit Customer Card';
?>

<h1 class="h2">Edit Customer Card</h1>
<div class="row my-4">
    <div class="col col-lg-6">
        <?php $form = ActiveForm::begin(['action' => '/customer/update']); ?>
                    <?= $form->field($customer, 'id')->hiddenInput()->label(false); ?>
                    <?= $form->field($customer, 'legal_name')->textInput()->label('Название организации или ИП') ?>
                    <?= $form->field($customer, 'legal_form')
                            ->dropdownList(
                                [
                                    'ИП' => 'ИП',
                                    'ООО' => 'ООО',
                                    'ПАО (ОАО)' => 'ПАО (ОАО)',
                                    'НАО (ЗАО)' => 'НАО (ЗАО)',
                                    'Унитарное предприятие' => 'Унитарное предприятие',
                                ],
                            )
                            ->label('Выберите организационно прaвовую форму');
                    ?>
                    <?= $form->field($customer, 'INN')->textInput()->label('ИНН') ?>
                    <?= $form->field($customer, 'phone')->textInput()->label('Телефон') ?>
                    <?= $form->field($customer, 'phone2')->textInput()->label('Телефон доп.') ?>
                    <?= $form->field($customer, 'email')->textInput()->label('Email') ?>
                    <?= $form->field($customer, 'email2')->textInput()->label('Email') ?>
                    <div class="form-group">
                        <?= Html::submitButton('Обновить', ['class' => 'btn btn-primary']) ?>
                    </div>
        <?php ActiveForm::end(); ?>

    </div>
</div>