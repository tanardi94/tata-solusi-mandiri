<?php

use yii\db\Migration;

/**
 * Class m201101_132232_add_column_unique_products_table
 */
class m201101_132232_add_column_unique_products_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->addColumn('product', 'unique_id', $this->string(40)->after('id'));
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        echo "m201101_132232_add_column_unique_products_table cannot be reverted.\n";

        return false;
    }

    /*
    // Use up()/down() to run migration code without a transaction.
    public function up()
    {

    }

    public function down()
    {
        echo "m201101_132232_add_column_unique_products_table cannot be reverted.\n";

        return false;
    }
    */
}
