<?php

namespace app\models;

use Yii;
use yii\db\ActiveRecord;
use app\models\Customer;
use app\models\Product;

class Deal extends ActiveRecord
{
    public function rules()
    {
        return [
            [['customer_id', 'product_id', 'quantity', 'price', 'business_status'], 'safe'],
            [['customer_id', 'product_id', 'quantity', 'price', 'business_status'], 'required'],
        ];
    }

    public function getCustomer()
    {
        return $this->hasOne(Customer::className(), ['id' => 'customer_id']);
    }

    public function getProduct()
    {
        return $this->hasOne(Product::className(), ['id' => 'product_id']);
    }
}
