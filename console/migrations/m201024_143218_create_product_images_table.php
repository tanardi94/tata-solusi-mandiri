<?php

use yii\db\Migration;

/**
 * Handles the creation of table `{{%product_images}}`.
 */
class m201024_143218_create_product_images_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('{{%product_images}}', [
            'id' => $this->primaryKey(),
            'product_id' => $this->integer()->notNull(),
            'image' => $this->string()->notNull(),
            'seq' => $this->integer()->notNull(),
            'status' => $this->integer()->defaultValue(1),
            'created_at' => $this->dateTime()->notNull(),
            'created_by' => $this->integer()->defaultValue(-1),
            'updated_at' => $this->dateTime()->notNull(),
            'updated_by' => $this->integer()->defaultValue(-1)
        ]);

        $this->addForeignKey(
            'image_product_fk',
            'product_images',
            'product_id',
            'product',
            'id'
        );
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropTable('{{%product_images}}');
        $this->dropForeignKey('image_product_fk', 'product_images');
    }
}
