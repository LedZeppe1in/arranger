<?php

use yii\db\Migration;

/**
 * Class m200113_153207_music_track_review
 */
class m200113_153207_music_track_review extends Migration
{
    public function up()
    {
        $tableOptions = null;
        if ($this->db->driverName === 'mysql')
            $tableOptions = 'CHARACTER SET utf8 COLLATE utf8_general_ci ENGINE=InnoDB';

        $this->createTable('{{%music_track_review}}', [
            'id' => $this->primaryKey(),
            'created_at' => $this->integer()->notNull(),
            'updated_at' => $this->integer()->notNull(),
            'music_track' => $this->integer()->notNull(),
            'review' => $this->integer()->notNull(),
        ], $tableOptions);

        $this->addForeignKey("music_track_review_music_track_fk", "{{%music_track_review}}",
            "music_track", "{{%music_track}}", "id", 'CASCADE');
        $this->addForeignKey("music_track_review_review_fk", "{{%music_track_review}}",
            "review", "{{%review}}", "id", 'CASCADE');
    }

    public function down()
    {
        $this->dropTable('{{%music_track_review}}');
    }
}