<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2017/12/28
 * Time: 14:45
 */

namespace app\admin\validate;


class AdministratorValidate extends BaseValidate
{
    protected $rule = [
        'admin_name'=>'require',
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