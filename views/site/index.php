<?php

use yii\helpers\Html;
use yii\bootstrap4\ActiveForm;
use yii\grid\GridView;
use yii\widgets\Pjax;
use rmrevin\yii\fontawesome\FAS;

$this->title = 'Simple CRM Example';
?>

<h1 class="h2">Simple CRM example</h1>
<div class="row my-4">
    <div class="col">
        <h2 class="h4 my-3">
            Контрагенты
            <button class="btn btn-sm btn-dark ml-3" data-toggle="modal" data-target="#newCustomer">
                Добавить
            </button>
        </h2>
        <?php Pjax::begin(); ?>
        <?=
            GridView::widget([
                'dataProvider' => $dataProviderCustomer,
                'columns' => [
                    ['class' => 'yii\grid\SerialColumn'],
                    [
                        'label' => 'ИНН',
                        'attribute' => 'INN',
                    ],
                    [
                        'label' => 'Название',
                        'attribute' => 'legal_name',
                    ],
                    [
                        'label' => 'Форма организации',
                        'attribute' => 'legal_form',
                    ],
                    [
                        'label' => 'Телефон',
                        'attribute' => 'phone',
                    ],
                    [
                        'label' => 'Телефон доп.',
                        'attribute' => 'phone2',
                    ],
                    [
                        'label' => 'Email',
                        'attribute' => 'email',
                    ],
                    [
                        'label' => 'Email доп',
                        'attribute' => 'email2',
                    ],
                    [
                        'class' => 'yii\grid\ActionColumn',
                        'controller' => 'customer',
                        'template' => '{view} {edit} {delete}',
                        'buttons' => [
                            'view' => function ($url, $model) {
                                return Html::a(FAS::icon('eye'), $url, ['class' => 'text-primary pr-2', 'title' => 'смотреть карточку']);
                            },
                            'edit' => function ($url, $model) {
                                return Html::a(FAS::icon('pencil-alt'), $url, ['class' => 'text-primary pr-2', 'title' => 'обновить']);
                            },
                            'delete' => function ($url, $model) {
                                return Html::a(FAS::icon('trash-alt'), $url, ['class' => 'text-danger pr-2', 'title' => 'удалить', 'data-confirm' => 'Вы уверены что хотите удалить контрагента?']);
                            },
                        ],
                        'header' => "Редактировать",
                    ],
                ],
            ]);
        ?>
        <?php Pjax::end(); ?>
    </div>
</div>

<div class="row my-4">
    <div class="col-6">
        <h2 class="h4 my-3">
            Товары
            <button class="btn btn-sm btn-dark ml-3" data-toggle="modal" data-target="#newProduct">
                Добавить
            </button>
        </h2>
        <?php Pjax::begin(); ?>
            <?=
            GridView::widget([
                'dataProvider' => $dataProviderProduct,
                'columns' => [
                    ['class' => 'yii\grid\SerialColumn'],
                    [
                        'label' => 'Наименование',
                        'attribute' => 'name',
                    ],
                    [
                        'label' => 'Цена, ₽',
                        'attribute' => 'price',
                    ],
                    [
                        'class' => 'yii\grid\ActionColumn',
                        'controller' => 'product',
                        'template' => '{view} {edit} {delete}',
                        'buttons' => [
                            'view' => function ($url, $model) {
                                return Html::a(FAS::icon('eye'), $url, ['class' => 'text-primary pr-2', 'title' => 'смотреть карточку']);
                            },
                            'edit' => function ($url, $model) {
                                return Html::a(FAS::icon('pencil-alt'), $url, ['class' => 'text-primary pr-2', 'title' => 'обновить']);
                            },
                            'delete' => function ($url, $model) {
                                return Html::a(FAS::icon('trash-alt'), $url, ['class' => 'text-danger pr-2', 'title' => 'удалить', 'data-confirm' => 'Вы уверены что хотите удалить товар?']);
                            },
                        ],
                        'header' => "Редактировать",
                    ],
                ],
            ]);
            ?>
        <?php Pjax::end(); ?>
    </div>

    <div class="col-6">
        <h2 class="h4 my-3">
            Услуги
            <button class="btn btn-sm btn-dark ml-3" data-toggle="modal" data-target="#newService">
                Добавить
            </button>
        </h2>
        <?php Pjax::begin(); ?>
            <?=
            GridView::widget([
                'dataProvider' => $dataProviderService,
                'columns' => [
                    ['class' => 'yii\grid\SerialColumn'],
                    [
                        'label' => 'Наименование',
                        'attribute' => 'name',
                    ],
                    [
                        'label' => 'Цена, ₽',
                        'attribute' => 'price',
                    ],
                    [
                        'class' => 'yii\grid\ActionColumn',
                        'controller' => 'product',
                        'template' => '{view} {edit} {delete}',
                        'buttons' => [
                            'view' => function ($url, $model) {
                                return Html::a(FAS::icon('eye'), $url, ['class' => 'text-primary pr-2', 'title' => 'смотреть карточку']);
                            },
                            'edit' => function ($url, $model) {
                                return Html::a(FAS::icon('pencil-alt'), $url, ['class' => 'text-primary pr-2', 'title' => 'обновить']);
                            },
                            'delete' => function ($url, $model) {
                                return Html::a(FAS::icon('trash-alt'), $url, ['class' => 'text-danger pr-2', 'title' => 'удалить', 'data-confirm' => 'Вы уверены что хотите удалить услугу?']);
                            },
                        ],
                        'header' => "Редактировать",
                    ],
                ],
            ]);
            ?>
        <?php Pjax::end(); ?>
    </div>
</div>


<div class="row my-4">
    <div class="col">
        <h2 class="h4 my-3">
            Сделки
            <button class="btn btn-sm btn-dark ml-3" data-toggle="modal" data-target="#newDeal">
                Создать
            </button>
        </h2>
        <?php Pjax::begin(); ?>
        <?=
            GridView::widget([
                'dataProvider' => $dataProviderDeal,
                'columns' => [
                    ['class' => 'yii\grid\SerialColumn'],
                    [
                        'label' => 'Контрагент',
                        'attribute' => 'customer.legal_name',
                    ],
                    [
                        'label' => 'Телефон',
                        'attribute' => 'customer.phone',
                    ],
                    [
                        'label' => 'Продукт',
                        'attribute' => 'product.name',
                    ],
                    [
                        'label' => 'Количество',
                        'attribute' => 'quantity',
                    ],
                    [
                        'label' => 'Цена, ₽',
                        'attribute' => 'price',
                    ],
                    [
                        'label' => 'Статус',
                        'attribute' => 'business_status',
                    ],

                    [
                        'label' => 'Дата создания',
                        'attribute' => 'created_at',
                        'format' => ['date', 'php:Y-m-d']
                    ],
                    [
                        'label' => 'Дата изменения',
                        'attribute' => 'updated_at',
                        'format' => ['date', 'php:Y-m-d']
                    ],
                    [
                        'class' => 'yii\grid\ActionColumn',
                        'controller' => 'deal',
                        'template' => '{view} {edit} {delete}',
                        'buttons' => [
                            'view' => function ($url, $model) {
                                return Html::a(FAS::icon('eye'), $url, ['class' => 'text-primary pr-2', 'title' => 'смотреть карточку']);
                            },
                            'edit' => function ($url, $model) {
                                return Html::a(FAS::icon('pencil-alt'), $url, ['class' => 'text-primary pr-2', 'title' => 'обновить']);
                            },
                            'delete' => function ($url, $model) {
                                return Html::a(FAS::icon('trash-alt'), $url, ['class' => 'text-danger pr-2', 'title' => 'удалить', 'data-confirm' => 'Вы уверены что хотите удалить сделку?']);
                            },
                        ],
                        'header' => "Редактировать",
                    ],
                ],
            ]);
        ?>
        <?php Pjax::end(); ?>
    </div>
</div>


<!-- Modal for Customer -->
<div class="modal fade" id="newCustomer" tabindex="-1" role="dialog" aria-labelledby="newCustomer" aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title mt-0">Добавить нового контрагента</h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <?php $form = ActiveForm::begin(['action' => '/customer/store']); ?>
                    <?= $form->field($modelCustomer, 'legal_name')->textInput()->label('Название организации или ИП') ?>
                    <?= $form->field($modelCustomer, 'legal_form')
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
                    <?= $form->field($modelCustomer, 'INN')->textInput()->label('ИНН') ?>
                    <?= $form->field($modelCustomer, 'phone')->textInput()->label('Телефон') ?>
                    <?= $form->field($modelCustomer, 'phone2')->textInput()->label('Телефон доп.') ?>
                    <?= $form->field($modelCustomer, 'email')->textInput()->label('Email') ?>
                    <?= $form->field($modelCustomer, 'email2')->textInput()->label('Email') ?>
                    <div class="form-group">
                        <?= Html::submitButton('Отправить', ['class' => 'btn btn-primary']) ?>
                    </div>
                <?php ActiveForm::end(); ?>
            </div>
        </div>
    </div>
</div>
<!-- Modal for Customer -->

<!-- Modal for Product -->
<div class="modal fade" id="newProduct" tabindex="-1" role="dialog" aria-labelledby="newProduct" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title mt-0">Добавить товар</h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <?php $form = ActiveForm::begin(['action' => '/product/store']); ?>
                    <?= $form->field($modelProduct, 'type')->hiddenInput(['value' => 'product'])->label(false); ?>
                    <?= $form->field($modelProduct, 'name')->textInput()->label('Наименование') ?>
                    <?= $form->field($modelProduct, 'price')->textInput(['type' => 'number'])->label('Цена реализации') ?>
                    <div class="form-group">
                        <?= Html::submitButton('Отправить', ['class' => 'btn btn-primary']) ?>
                    </div>
                <?php ActiveForm::end(); ?>
            </div>
        </div>
    </div>
</div>
<!-- Modal for Product -->


<!-- Modal for Service -->
<div class="modal fade" id="newService" tabindex="-1" role="dialog" aria-labelledby="newService" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title mt-0">Добавить услугу</h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <?php $form = ActiveForm::begin(['action' => '/product/store']); ?>
                    <?= $form->field($modelProduct, 'type')->hiddenInput(['value' => 'service'])->label(false); ?>
                    <?= $form->field($modelProduct, 'name')->textInput()->label('Наименование') ?>
                    <?= $form->field($modelProduct, 'price')->textInput(['type' => 'number'])->label('Цена реализации') ?>
                    <div class="form-group">
                        <?= Html::submitButton('Отправить', ['class' => 'btn btn-primary']) ?>
                    </div>
                <?php ActiveForm::end(); ?>
            </div>
        </div>
    </div>
</div>
<!-- Modal for Service -->

<!-- Modal for Deal -->
<div class="modal fade" id="newDeal" tabindex="-1" role="dialog" aria-labelledby="newDeal" aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title mt-0">Добавить сделку</h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <?php $form = ActiveForm::begin(['action' => '/deal/store']); ?>
                    <?= $form->field($modelDeal, 'customer_id')
                        ->dropdownList($customerDataforDealForm)
                        ->label('Выберите контрагента')
                    ?>
                    <?= $form->field($modelDeal, 'product_id')
                        ->dropdownList($productDataforDealForm)
                        ->label('Выберите продукт')
                    ?>
                    <?= $form->field($modelDeal, 'quantity')->textInput(['type' => 'number'])->label('Количество') ?>
                    <?= $form->field($modelDeal, 'business_status')
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
        </div>
    </div>
</div>
<!-- Modal for Deal -->