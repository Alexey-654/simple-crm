<?php
/**
 * @link http://www.yiiframework.com/
 * @copyright Copyright (c) 2008 Yii Software LLC
 * @license http://www.yiiframework.com/license/
 */

namespace app\commands;

use yii\console\Controller;
use yii\console\ExitCode;
use app\models\Product;
use app\models\Customer;
use app\models\Deal;

class SeedController extends Controller
{
    /**
     * This command echoes what you have entered as the message.
     * @param string $message the message to be echoed.
     * @return int Exit code
     */
    public function actionIndex()
    {
        $faker = \Faker\Factory::create();

        Product::deleteAll();
        for ($i = 0; $i < 100; $i++) {
            $product = new Product();
            $product->name = $faker->word;
            $product->price = $faker->numberBetween(50, 10000);
            $product->type = $faker->randomElement(['service', 'product']);
            $product->created_at = $faker->dateTimeBetween('-2 years', '-1 years')->format('c');
            $product->updated_at = $faker->dateTimeBetween('-1 year')->format('c');
            $product->save();
        }

        Customer::deleteAll();
        for ($i = 0; $i < 50; $i++) {
            $customer = new Customer();
            $customer->INN = $faker->numerify('##########');
            $customer->legal_name = $faker->company;
            $customer->legal_form = $faker->randomElement(['ИП', 'ООО', 'ПАО (ОАО)', 'НАО (ЗАО)', 'Унитарное предприятие']);
            $customer->phone = $faker->e164PhoneNumber;
            $customer->phone2 = $faker->e164PhoneNumber;
            $customer->email = $faker->email;
            $customer->email2 = $faker->freeEmail;
            $customer->created_at = $faker->dateTimeBetween('-2 years', '-1 years')->format('c');
            $customer->updated_at = $faker->dateTimeBetween('-1 year')->format('c');
            $customer->save();
        }

        Deal::deleteAll();
        for ($i = 0; $i < 120; $i++) {
            $deal = new Deal();
            $deal->customer_id = $faker->numberBetween(1, 50);
            $deal->product_id = $faker->numberBetween(1, 100);
            $deal->quantity = $faker->numberBetween(1, 100);
            $deal->price = Product::findOne($deal->product_id)->price;
            $deal->business_status = $faker->randomElement(['Холодный клиент', 'Теплый клиент', 'Горячий клиент', 'Сделка закрыта', 'Сделка проваленна']);
            $deal->created_at = $faker->dateTimeBetween('-2 years', '-1 years')->format('c');
            $deal->updated_at = $faker->dateTimeBetween('-1 year')->format('c');
            $deal->save();
        }

        return ExitCode::OK;
    }
}
