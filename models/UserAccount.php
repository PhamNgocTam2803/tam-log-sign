<?php

namespace app\models;

use Yii;
use yii\db\ActiveRecord;
use yii\web\IdentityInterface;

/**
 * This is the model class for table "user_account".
 *
 * @property int $id
 * @property string $fullname
 * @property string $email
 * @property string $password
 */
class UserAccount extends \yii\db\ActiveRecord implements IdentityInterface
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
    public static function findIdentity($id)
    {
        return self::findOne($id);
    }

    /**
    * Finds user by email
    *
    * @param string $email
    * @return UserAccount|null
    */
    public static function findByEmail($email)
    {
        return self::findOne(['email' => $email]);
    }

    /**
     * {@inheritdoc}
     */
    public static function findIdentityByAccessToken($token, $type = null)
    {
        return null; // Nếu không sử dụng token
    }

    /**
     * {@inheritdoc}
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * Gets auth key
     * @return string
     */
    public function getAuthKey()
    {
        return ''; // Nếu không sử dụng authKey
    }

    /**
     * Validates auth key
     * @param string $authKey
     * @return bool
     */
    public function validateAuthKey($authKey)
    {
        return false; // Nếu không sử dụng authKey
    }

    /**
     * Validates password
     * @param string $password
     * @return bool
     */
    public function validatePassword($password)
    {
        return Yii::$app->getSecurity()->validatePassword($password, $this->password);
    }
}
