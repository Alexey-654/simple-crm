<?php

use yii\db\Migration;

/**
 * Handles the creation of table `{{%deal}}`.
 */
class m201204_134257_create_deal_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('{{%deal}}', [
            'id' => $this->primaryKey(),
            'customer_id' => $this->integer()->notNull(),
            'product_id' => $this->integer()->notNull(),
            'quantity' => $this->integer()->notNull(),
            'price' => $this->money()->notNull(),
            'business_status' => $this->string()->notNull(),
            'status' => $this->string()->defaultValue('active'),
            'created_at' => $this->datetime()->defaultValue(date('c')),
            'updated_at' => $this->datetime()->defaultValue(date('c')),
        ]);
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropTable('{{%deal}}');
    }
}
