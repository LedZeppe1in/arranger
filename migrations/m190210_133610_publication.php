<?php

use yii\db\Migration;

/**
 * Class m190210_133610_publication
 */
class m190210_133610_publication extends Migration
{
    public function up()
    {
        $tableOptions = null;
        if ($this->db->driverName === 'mysql')
            $tableOptions = 'CHARACTER SET utf8 COLLATE utf8_general_ci ENGINE=InnoDB';

        $this->createTable('{{%publication}}', [
            'id' => $this->primaryKey(),
            'created_at' => $this->integer()->notNull(),
            'updated_at' => $this->integer()->notNull(),
            'name' => $this->string()->notNull(),
            'link' => $this->text(),
            'text' => $this->text(),
        ], $tableOptions);

        $this->createIndex('idx_publication_name', '{{%publication}}', 'name');
    }

    public function down()
    {
        $this->dropTable('{{%publication}}');
    }
}
