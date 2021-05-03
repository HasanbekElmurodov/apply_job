<?php

use yii\db\Migration;

/**
 * Handles the creation of table `{{%user}}`.
 */
class m210416_085833_create_user_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('{{%user}}', [
            'id' => $this->primaryKey(),
            'username' => $this->string()->notNull(),
            'password' => $this->string()->notNull(),
            'full_name' => $this->string()->notNull(),
            'status' => $this->boolean(),
            'created_at' => $this->timestamp()
        ]);
        $this->insert('user', [
            'username' => 'admin',
            'password' => Yii::$app->security->generatePasswordHash("123456"),
            'full_name' => 'admin admin',
            'status' => 1,
            'created_at' => time(),
        ]);
//        $2y$13$pGNcRvHGeMvUFFHy1PDOy.yunXNI6y1sOBzVVSXXhydoccZIXumJy

    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropTable('{{%user}}');
    }
}
