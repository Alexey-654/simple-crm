<?php

namespace app\controllers;

use Yii;
use yii\web\Controller;
use app\models\Customer;
use app\models\Product;
use app\models\Deal;
use yii\data\ActiveDataProvider;

class SiteController extends Controller
{
    public function actionIndex()
    {
        $productDataforDealForm = Product::getDataforDealForm();
        $customerDataforDealForm = Customer::getDataforDealForm();

        $modelCustomer = new Customer();
        $modelProduct = new Product();
        $modelDeal = new Deal();

        $dataProviderCustomer = new ActiveDataProvider([
            'query' => Customer::find()->where(['status' => 'active']),
            'pagination' => [
                'pageSize' => 10,
                'pageParam' => 'customer-page'
            ],

        ]);

        $dataProviderProduct = new ActiveDataProvider([
            'query' => Product::find()->where(['type' => 'product', 'status' => 'active']),
            'pagination' => [
                'pageSize' => 10,
                'pageParam' => 'product-page'
            ],
        ]);


        $dataProviderService = new ActiveDataProvider([
            'query' => Product::find()->where(['type' => 'service', 'status' => 'active']),
            'pagination' => [
                'pageSize' => 10,
                'pageParam' => 'service-page'
            ],
        ]);

        $dataProviderDeal = new ActiveDataProvider([
            'query' => Deal::find()->where(['status' => 'active']),
            'pagination' => [
                'pageSize' => 10,
                'pageParam' => 'deal-page'
            ],
        ]);

        return $this->render("index", compact(
            'modelCustomer',
            'modelProduct',
            'modelDeal',
            'dataProviderCustomer',
            'dataProviderProduct',
            'dataProviderService',
            'customerDataforDealForm',
            'productDataforDealForm',
            'dataProviderDeal'
        ));
    }
}
