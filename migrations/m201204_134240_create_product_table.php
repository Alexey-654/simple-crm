<?php

use yii\db\Migration;

/**
 * Handles the creation of table `{{%product}}`.
 */
class m201204_134240_create_product_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('{{%product}}', [
            'id' => $this->primaryKey(),
            'name' => $this->string()->notNull(),
            'price' => $this->money()->notNull(),
            'type' => $this->string()->notNull(),
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
        $this->dropTable('{{%product}}');
    }
}
