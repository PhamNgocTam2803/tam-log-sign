<?php

namespace app\models;

use Yii;
use yii\base\Model;

class SignUpForm extends Model
{
    public $fullname;
    public $email;
    public $password;
    public $re_password;

    public function rules()
    {
        return [
            [['fullname','email','password','re_password'],'required'],
            ['password','string','min'=> 8, 'tooShort'=> 'Mật khẩu phải từ 8 kí tự trở lên'],
            ['password','match','pattern'=>'/^[a-zA-Z0-9@%&*]+$/','message'=>'Mật chỉ được chứa những kí tự đặc biệt @,%,&,*'],
            ['email','email'],
            ['email','unique','message'=>'Email này đã được sử dụng.'],
            ['re_password','compare','compareAttribute'=>'password','message'=>'Mật khẩu nhập lại không đúng'],
        ];
    }

    public function saveSignUpForm()
    {
        if ($this->validate()){
        $user_account = new UserAccount();
        $user_account->fullname = $this->fullname;
        $user_account->email = $this->email;
        $user_account->password = Yii::$app->getSecurity()->generatePasswordHash($this->password);

        return $user_account->save();
        }
        return false;
    }
}

