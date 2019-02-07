<?php

use yii\db\Migration;

/**
 * Class m190206_130017_user
 */
class m190206_130017_user extends Migration
{
    public function up()
    {
        $tableOptions = null;
        if ($this->db->driverName === 'mysql')
            $tableOptions = 'CHARACTER SET utf8 COLLATE utf8_general_ci ENGINE=InnoDB';

        $this->createTable('{{%user}}', [
            'id' => $this->primaryKey(),
            'created_at' => $this->integer()->notNull(),
            'updated_at' => $this->integer()->notNull(),
            'username' => $this->string()->notNull(),
            'auth_key' => $this->string(32),
            'email_confirm_token' => $this->string(),
            'password_hash' => $this->string()->notNull(),
            'password_reset_token' => $this->string(),
            'full_name' => $this->string()->notNull(),
            'email' => $this->string()->notNull(),
            'phone' => $this->string()->notNull(),
            'youtube_link' => $this->string(),
            'instagram_link' => $this->string(),
            'facebook_link' => $this->string(),
            'twitter_link' => $this->string(),
            'vk_link' => $this->string(),
            'biography' => $this->string(),
        ], $tableOptions);

        $this->createIndex('idx_user_username', '{{%user}}', 'username');
        $this->createIndex('idx_user_full_name', '{{%user}}', 'full_name');
    }

    public function down()
    {
        $this->dropTable('{{%user}}');
    }
}