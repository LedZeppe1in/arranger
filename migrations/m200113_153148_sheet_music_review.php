<?php

use yii\db\Migration;

/**
 * Class m200113_153148_sheet_music_review
 */
class m200113_153148_sheet_music_review extends Migration
{
    public function up()
    {
        $tableOptions = null;
        if ($this->db->driverName === 'mysql')
            $tableOptions = 'CHARACTER SET utf8 COLLATE utf8_general_ci ENGINE=InnoDB';

        $this->createTable('{{%sheet_music_review}}', [
            'id' => $this->primaryKey(),
            'created_at' => $this->integer()->notNull(),
            'updated_at' => $this->integer()->notNull(),
            'sheet_music' => $this->integer()->notNull(),
            'review' => $this->integer()->notNull(),
        ], $tableOptions);

        $this->addForeignKey("sheet_music_review_sheet_music_fk", "{{%sheet_music_review}}",
            "sheet_music", "{{%sheet_music}}", "id", 'CASCADE');
        $this->addForeignKey("sheet_music_review_review_fk", "{{%sheet_music_review}}",
            "review", "{{%review}}", "id", 'CASCADE');
    }

    public function down()
    {
        $this->dropTable('{{%sheet_music_review}}');
    }
}