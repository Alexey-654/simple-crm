<?php

namespace app\controllers;

use Yii;
use yii\web\Controller;
use app\models\Customer;

class CustomerController extends Controller
{
    public function actionStore()
    {
        $customerData = Yii::$app->request->post('Customer');

        $customer = new Customer();
        $customer->attributes = $customerData;
        if ($customer->save()) {
            Yii::$app->session->setFlash('success', 'Новый клиент добавлен успешно.');
        } else {
            Yii::$app->session->setFlash('warning', 'Что-то пошло не так. Вероятно клиент с таким ИНН уже есть в базе.');
        }

        return $this->redirect('/');
    }

    public function actionView()
    {
        $id = \Yii::$app->request->get('id');
        $customer = Customer::findOne(['id' => $id]);
        return $this->render("view", compact('customer'));
    }

    public function actionEdit()
    {
        $id = \Yii::$app->request->get('id');
        $customer = Customer::findOne(['id' => $id]);
        return $this->render("edit", compact('customer'));
    }

    public function actionUpdate()
    {
        $customerData = \Yii::$app->request->post('Customer');
        $customer = Customer::findOne(['id' => $customerData['id']]);
        $customer->attributes = $customerData;
        $customer->updated_at = date('c');
        if ($customer->save()) {
            Yii::$app->session->setFlash('success', 'Данные по клиенту обновлены.');
        } else {
            Yii::$app->session->setFlash('warning', 'Что-то пошло не так. Проверьте данные и попробуйте еще раз.');
        }
        return $this->redirect('/');
    }

    public function actionDelete()
    {
        $id = \Yii::$app->request->get('id');
        $customer = Customer::findOne(['id' => $id]);
        $customer->status = 'deleted';
        $customer->updated_at = date('c');
        $customer->save();
        Yii::$app->session->setFlash('success', 'Клиент удален из каталога.');

        return $this->redirect('/');
    }
}
