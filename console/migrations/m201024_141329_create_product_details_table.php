<?php

use yii\db\Migration;

/**
 * Handles the creation of table `{{%product_details}}`.
 */
class m201024_141329_create_product_details_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('{{%product_details}}', [
            'id' => $this->primaryKey(),
            'product_id' => $this->integer()->notNull(),
            'parent_id' => $this->integer()->defaultValue(-1),
            'level' => $this->integer()->defaultValue(1),
            'specification' => $this->string(),
            'key' => $this->string(),
            'value' => $this->string(),
            'status' => $this->integer()->defaultValue(1),
            'created_at' => $this->dateTime()->notNull(),
            'created_by' => $this->integer()->defaultValue(-1),
            'updated_at' => $this->dateTime()->notNull(),
            'updated_by' => $this->integer()->defaultValue(-1),
            ]);

        $this->addForeignKey(
            'details_product_fk', 
            'product_details', 
            'product_id', 
            'product',
             'id'
            );

        $this->addForeignKey(
            'details_parent_fk',
            'product_details',
            'parent_id',
            'product_details',
            'id'
        );
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropTable('{{%product_details}}');
        $this->dropForeignKey('details_parent_fk', 'product_details');
        $this->dropForeignKey('details_product_fk', 'product_details');
    }
}
