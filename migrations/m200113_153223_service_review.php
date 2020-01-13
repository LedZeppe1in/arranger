<?php

use yii\db\Migration;

/**
 * Class m200113_153223_service_review
 */
class m200113_153223_service_review extends Migration
{
    public function up()
    {
        $tableOptions = null;
        if ($this->db->driverName === 'mysql')
            $tableOptions = 'CHARACTER SET utf8 COLLATE utf8_general_ci ENGINE=InnoDB';

        $this->createTable('{{%service_review}}', [
            'id' => $this->primaryKey(),
            'created_at' => $this->integer()->notNull(),
            'updated_at' => $this->integer()->notNull(),
            'service' => $this->integer()->notNull(),
            'review' => $this->integer()->notNull(),
        ], $tableOptions);

        $this->addForeignKey("service_review_service_fk", "{{%service_review}}",
            "service", "{{%service}}", "id", 'CASCADE');
        $this->addForeignKey("service_review_review_fk", "{{%service_review}}",
            "review", "{{%review}}", "id", 'CASCADE');
    }

    public function down()
    {
        $this->dropTable('{{%service_review}}');
    }
}