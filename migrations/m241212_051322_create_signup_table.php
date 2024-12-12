<?php

use yii\db\Migration;

/**
 * Handles the creation of table `{{%signup}}`.
 */
class m241212_051322_create_signup_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('{{%user_account}}', [
            'id' => $this->primaryKey(),
            'fullname'=>$this->string(255)->notNull(),
            'email'=>$this->string(255)->notNull()->unique(),
            'password'=>$this->text()->notNull(),


        ]);
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropTable('{{%user_account}}');
    }
}
