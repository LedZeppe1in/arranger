<?php

use yii\db\Migration;

/**
 * Class m190210_133345_project
 */
class m190210_133345_project extends Migration
{
    public function up()
    {
        $tableOptions = null;
        if ($this->db->driverName === 'mysql')
            $tableOptions = 'CHARACTER SET utf8 COLLATE utf8_general_ci ENGINE=InnoDB';

        $this->createTable('{{%project}}', [
            'id' => $this->primaryKey(),
            'created_at' => $this->integer()->notNull(),
            'updated_at' => $this->integer()->notNull(),
            'name' => $this->string()->notNull(),
            'link' => $this->text()->notNull(),
            'description' => $this->text(),
        ], $tableOptions);

        $this->createIndex('idx_project_name', '{{%project}}', 'name');
    }

    public function down()
    {
        $this->dropTable('{{%project}}');
    }
}
