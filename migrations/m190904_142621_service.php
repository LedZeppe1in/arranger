<?php

use yii\db\Migration;

/**
 * Class m190904_142621_service
 */
class m190904_142621_service extends Migration
{
    public function up()
    {
        $tableOptions = null;
        if ($this->db->driverName === 'mysql')
            $tableOptions = 'CHARACTER SET utf8 COLLATE utf8_general_ci ENGINE=InnoDB';

        $this->createTable('{{%service}}', [
            'id' => $this->primaryKey(),
            'created_at' => $this->integer()->notNull(),
            'updated_at' => $this->integer()->notNull(),
            'name' => $this->string()->notNull(),
            'price' => $this->money(12, 2)->notNull(),
            'description' => $this->text(),
        ], $tableOptions);

        $this->createIndex('idx_service_name', '{{%service}}', 'name');
    }

    public function down()
    {
        $this->dropTable('{{%service}}');
    }
}
