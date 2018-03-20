<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2017/12/29
 * Time: 16:13
 */

namespace app\index\validate;


class UserValidate extends BaseValidate
{
    protected $rule =[
      'user_name'=>'require',
        'user_id'=>'require|min:6',
        'password'=>'require|min:6|samePassword'
    ];

    protected $message = [
        'password.samePassword'=>'两次密码不一致'
    ];

    public function samePassword($value,$rule,$values){
        if($values['password']!==$values['password2']){
            return false;
        }else{
            return true;
        }
    }
}