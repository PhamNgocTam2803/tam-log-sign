<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "user_account".
 *
 * @property int $id
 * @property string $fullname
 * @property string $email
 * @property string $password
 */
class UserAccount extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'user_account';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['fullname', 'email', 'password'], 'required'],
            [['password'], 'string'],
            [['fullname', 'email'], 'string', 'max' => 255],
            [['email'], 'unique'],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'fullname' => 'Fullname',
            'email' => 'Email',
            'password' => 'Password',
        ];
    }
}
