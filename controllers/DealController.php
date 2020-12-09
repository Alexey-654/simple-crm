<?php

namespace app\controllers;

use Yii;
use yii\web\Controller;
use app\models\Product;
use app\models\Deal;

class DealController extends Controller
{
    public function actionStore()
    {
        $dealData = Yii::$app->request->post('Deal');

        $product = Product::findOne(['id' => $dealData['product_id']]);
        $deal = new Deal();
        $deal->attributes = $dealData;
        $deal->price = $product->price;
        $deal->save();

        Yii::$app->session->setFlash('success', 'Новая сделка добавлена успешно.');
        return $this->redirect('/');
    }

    public function actionView()
    {
        $id = \Yii::$app->request->get('id');
        $deal = Deal::findOne(['id' => $id]);
        $product = $deal->getProduct()->asArray()->one();
        $customer = $deal->getCustomer()->asArray()->one();
        return $this->render("view", compact('deal', 'product', 'customer'));
    }

    public function actionEdit()
    {
        $id = \Yii::$app->request->get('id');
        $deal = Deal::findOne(['id' => $id]);
        $product = $deal->getProduct()->asArray()->one();
        $customer = $deal->getCustomer()->asArray()->one();
        return $this->render("edit", compact('deal', 'product', 'customer'));
    }

    public function actionUpdate()
    {
        $dealData = \Yii::$app->request->post('Deal');
        $deal = Deal::findOne(['id' => $dealData['id']]);
        $deal->attributes = $dealData;
        $deal->updated_at = date('c');
        $deal->save();
        Yii::$app->session->setFlash('success', 'Данные по сделке обновлены.');

        return $this->redirect('/');
    }

    public function actionDelete()
    {
        $id = \Yii::$app->request->get('id');
        $deal = Deal::findOne(['id' => $id]);
        $deal->status = 'deleted';
        $deal->updated_at = date('c');
        $deal->save();
        Yii::$app->session->setFlash('success', 'Сделка удалена из каталога.');

        return $this->redirect('/');
    }
}
