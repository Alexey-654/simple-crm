<?php

namespace app\models;

use Yii;
use yii\db\ActiveRecord;

class Customer extends ActiveRecord
{
    public function rules()
    {
        return [
            [['INN', 'legal_name', 'legal_form', 'phone', 'phone2', 'email', 'email2'], 'safe'],
            [['INN', 'legal_name', 'legal_form', 'phone', 'email'], 'required'],
            ['INN', 'unique'],
        ];
    }

    public static function getDataforDealForm()
    {
        $items = self::find()->where(['status' => 'active'])->asArray()->all();

        return array_reduce($items, function ($acc, $item) {
            $acc[$item['id']] = "ИНН {$item['INN']} {$item['legal_name']}";
            return $acc;
        }, []);
    }
}
