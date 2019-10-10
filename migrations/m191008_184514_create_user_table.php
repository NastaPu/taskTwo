<?php

use yii\db\Migration;

/**
 * Handles the creation of table `{{%user}}`.
 */
class m191008_184514_create_user_table extends Migration
{
    public function safeUp()
    {
        $this->createTable('{{%user}}', [
            'id'       => $this->primaryKey(),
            'username' => $this->string(100)->notNull(),
            'password' => $this->string(255),
            'state'    => $this->string()->notNull()
        ]);
    }

    public function safeDown()
    {
        $this->dropTable('{{%user}}');
    }
}
