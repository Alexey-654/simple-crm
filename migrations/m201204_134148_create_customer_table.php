<?php

use yii\db\Migration;

/**
 * Handles the creation of table `{{%customer}}`.
 */
class m201204_134148_create_customer_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('{{%customer}}', [
            'id' => $this->primaryKey(),
            'INN' => $this->string()->notNull()->unique(),
            'legal_name' => $this->string()->notNull(),
            'legal_form' => $this->string()->notNull(),
            'phone' => $this->string()->notNull(),
            'phone2' => $this->string()->notNull(),
            'email' => $this->string()->notNull(),
            'email2' => $this->string()->notNull(),
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
        $this->dropTable('{{%customer}}');
    }
}
