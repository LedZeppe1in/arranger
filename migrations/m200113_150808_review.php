<?php

use yii\db\Migration;

/**
 * Class m200113_150808_review
 */
class m200113_150808_review extends Migration
{
    public function up()
    {
        $tableOptions = null;
        if ($this->db->driverName === 'mysql')
            $tableOptions = 'CHARACTER SET utf8 COLLATE utf8_general_ci ENGINE=InnoDB';

        $this->createTable('{{%review}}', [
            'id' => $this->primaryKey(),
            'created_at' => $this->integer()->notNull(),
            'updated_at' => $this->integer()->notNull(),
            'name' => $this->string()->notNull(),
            'city' => $this->string(),
            'occupation' => $this->string(),
            'text' => $this->text(),
        ], $tableOptions);

        $this->createIndex('idx_review_name', '{{%review}}', 'name');
    }

    public function down()
    {
        $this->dropTable('{{%review}}');
    }
}