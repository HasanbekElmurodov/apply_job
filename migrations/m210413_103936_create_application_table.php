<?php

use yii\db\Migration;

/**
 * Handles the creation of table `{{%application}}`.
 */
class m210413_103936_create_application_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('{{%application}}', [
            'id' => $this->primaryKey(),
            'full_name' => $this->string()->notNull(),
            'address' => $this->string()->notNull(),
            'country_of_origin' => $this->string()->notNull(),
            'email' => $this->string()->notNull()->unique(),
            'phone_number' => $this->string()->notNull()->unique(),
            'age' => $this->integer()->notNull(),
            'status' => $this->integer()->defaultValue(1),
            'created_at' => $this->timestamp()
        ]);
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropTable('{{%application}}');
    }
}
