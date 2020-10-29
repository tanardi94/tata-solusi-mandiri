<?php

use yii\db\Migration;

/**
 * Handles the creation of table `{{%product_category}}`.
 */
class m201029_053209_create_product_category_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('{{%product_category}}', [
            'id' => $this->primaryKey(),
            'name' => $this->string()->notNull(),
            'used_by' => $this->integer()->notNull(),
            'status' => $this->integer()->defaultValue(1),
            'created_at' => $this->dateTime()->notNull(),
            'created_by' => $this->integer()->defaultValue(-1),
            'updated_at' => $this->dateTime()->notNull(),
            'updated_by' => $this->integer()->defaultValue(-1),
        ]);

        $this->addForeignKey(
            'product_category_fk',
            'product',
            'category',
            'product_category',
            'id'
        );
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropTable('{{%product_category}}');
    }
}
