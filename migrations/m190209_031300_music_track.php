<?php

use yii\db\Migration;

/**
 * Class m190209_031300_music_track
 */
class m190209_031300_music_track extends Migration
{
    public function up()
    {
        $tableOptions = null;
        if ($this->db->driverName === 'mysql')
            $tableOptions = 'CHARACTER SET utf8 COLLATE utf8_general_ci ENGINE=InnoDB';

        $this->createTable('{{%music_track}}', [
            'id' => $this->primaryKey(),
            'created_at' => $this->integer()->notNull(),
            'updated_at' => $this->integer()->notNull(),
            'name' => $this->string()->notNull(),
            'type' => $this->smallInteger()->notNull()->defaultValue(0),
            'duration' => $this->time()->notNull(),
            'price' => $this->money(12, 2)->notNull(),
            'preview' => $this->text()->notNull(),
            'file' => $this->text()->notNull(),
            'description' => $this->text(),
        ], $tableOptions);

        $this->createIndex('idx_music_track_name', '{{%music_track}}', 'name');
    }

    public function down()
    {
        $this->dropTable('{{%music_track}}');
    }
}