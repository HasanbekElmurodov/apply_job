<?php

use yii\db\Migration;

/**
 * Handles the creation of table `{{%interview}}`.
 */
class m210415_091114_create_interview_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('{{%interview}}', [
            'id' => $this->primaryKey(),
            'examiner_id' => $this->integer(),
            'applicant_id' => $this->integer(),
            'interview_time' => $this->date()
        ]);
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropTable('{{%interview}}');
    }
}
