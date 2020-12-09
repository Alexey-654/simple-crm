<?php

namespace app\controllers;

use Yii;
use yii\web\Controller;
use app\models\Product;

class ProductController extends Controller
{
    public function actionStore()
    {
        $productData = Yii::$app->request->post('Product');

        $product = new Product();
        $product->attributes = $productData;
        $product->save();

        Yii::$app->session->setFlash('success', 'Новый товар добавлен успешно.');

        return $this->redirect('/');
    }

    public function actionView()
    {
        $id = \Yii::$app->request->get('id');
        $product = Product::findOne(['id' => $id]);

        return $this->render("view", compact('product'));
    }

    public function actionEdit()
    {
        $id = \Yii::$app->request->get('id');
        $product = Product::findOne(['id' => $id]);

        return $this->render("edit", compact('product'));
    }

    public function actionUpdate()
    {
        $productData = \Yii::$app->request->post('Product');
        $product = Product::findOne(['id' => $productData['id']]);
        $product->attributes = $productData;
        $product->updated_at = date('c');
        $product->save();
        Yii::$app->session->setFlash('success', 'Данные по товару/услуге обновленны.');

        return $this->redirect('/');
    }

    public function actionDelete()
    {
        $id = \Yii::$app->request->get('id');
        $product = Product::findOne(['id' => $id]);
        $product->status = 'deleted';
        $product->updated_at = date('c');
        $product->save();
        Yii::$app->session->setFlash('success', 'Продукт удален из каталога.');

        return $this->redirect('/');
    }
}
