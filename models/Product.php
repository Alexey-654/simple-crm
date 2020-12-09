<?php

namespace app\models;

use Yii;
use yii\db\ActiveRecord;

class Product extends ActiveRecord
{
    public function rules()
    {
        return [
            [['name', 'price', 'type'], 'safe'],
            [['name', 'price', 'type'], 'required'],
        ];
    }

    public static function getDataforDealForm()
    {
        $items = self::find()->asArray()->all();

        return array_reduce($items, function ($acc, $item) {
            $type = $item['type'] === 'product' ? 'Товар' : 'Услуга';
            $acc[$item['id']] = "{$type} {$item['name']} {$item['price']} ₽";
            return $acc;
        }, []);
    }
}
