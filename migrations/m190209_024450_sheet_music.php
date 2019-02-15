<?php

use yii\db\Migration;

/**
 * Class m190209_024450_sheet_music
 */
class m190209_024450_sheet_music extends Migration
{
    public function up()
    {
        $tableOptions = null;
        if ($this->db->driverName === 'mysql')
            $tableOptions = 'CHARACTER SET utf8 COLLATE utf8_general_ci ENGINE=InnoDB';

        $this->createTable('{{%sheet_music}}', [
            'id' => $this->primaryKey(),
            'created_at' => $this->integer()->notNull(),
            'updated_at' => $this->integer()->notNull(),
            'name' => $this->string()->notNull(),
            'type' => $this->smallInteger()->notNull()->defaultValue(0),
            'price' => $this->money()->notNull(),
            'file' => $this->text()->notNull(),
            'description' => $this->text(),
        ], $tableOptions);

        $this->createIndex('idx_sheet_music_name', '{{%sheet_music}}', 'name');
    }

    public function down()
    {
        $this->dropTable('{{%sheet_music}}');
    }
}