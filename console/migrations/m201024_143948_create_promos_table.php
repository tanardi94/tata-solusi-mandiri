<?php

use yii\db\Migration;

/**
 * Handles the creation of table `{{%promos}}`.
 */
class m201024_143948_create_promos_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('{{%promos}}', [
            'id' => $this->primaryKey(),
            'title' => $this->string()->notNull(),
            'description' => $this->text()->notNull(),
            'start_date' => $this->date(),
            'end_date' => $this->date(),
            'use_alert' => $this->integer()->defaultValue(0),
            'status' => $this->integer()->defaultValue(1),
            'created_at' => $this->dateTime()->notNull(),
            'created_by' => $this->integer()->defaultValue(-1),
            'updated_at' => $this->dateTime()->notNull(),
            'updated_by' => $this->integer()->defaultValue(-1),
        ]);
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropTable('{{%promos}}');
    }
}
