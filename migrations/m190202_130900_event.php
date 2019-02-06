<?php

use yii\db\Migration;

/**
 * Class m190202_130900_event
 */
class m190202_130900_event extends Migration
{
    public function up()
    {
        $tableOptions = null;
        if ($this->db->driverName === 'mysql')
            $tableOptions = 'CHARACTER SET utf8 COLLATE utf8_general_ci ENGINE=InnoDB';

        $this->createTable('{{%event}}', [
            'id' => $this->primaryKey(),
            'created_at' => $this->integer()->notNull(),
            'updated_at' => $this->integer()->notNull(),
            'name' => $this->string()->notNull(),
            'date' => $this->dateTime()->notNull(),
            'duration' => $this->time()->notNull(),
            'location' => $this->string()->notNull(),
            'link' => $this->string(),
            'description' => $this->string(),
        ], $tableOptions);

        $this->createIndex('idx_event_name', '{{%event}}', 'name');
    }

    public function down()
    {
        $this->dropTable('{{%event}}');
    }
}