<?php

use yii\db\Migration;

/**
 * Handles the creation of table `{{%message}}`.
 */
class m191009_191821_create_message_table extends Migration
{
    const TABLE_NAME = '{{%message}}';
    
    public function safeUp()
    {
        $this->createTable(self::TABLE_NAME, [
            'id'             => $this->primaryKey(),
            'user_id'        => $this->integer()->notNull(),
            'contact_id'     => $this->integer(),
            'send_time'      => $this->timestamp()->notNull(),
            'delivery_time'  => $this->timestamp()->notNull(),
            'content'        => $this->text()->notNull()
        ]);

        $this->addForeignKey(
            'user_id',
            self::TABLE_NAME,
            'user_id',
            '{{%user}}',
            'id',
            'CASCADE'
        );

        $this->addForeignKey(
            'contact_id',
            self::TABLE_NAME,
            'contact_id',
            '{{%user}}',
            'id',
            'CASCADE'
        );
    }

    public function safeDown()
    {
        $this->dropTable(self::TABLE_NAME);
        $this->dropForeignKey('user_id', self::TABLE_NAME);
        $this->dropForeignKey('contact_id', self::TABLE_NAME);
    }
}
