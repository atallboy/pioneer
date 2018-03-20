<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2018/1/9
 * Time: 10:52
 */

namespace app\index\validate;


use app\admin\validate\BaseValidate;

class LoginValidate extends BaseValidate
{
    protected $rule =[
        'user_id'=>'require',
        'password'=>'require'
    ];
    protected $message = [
        'user_id.require'=>'用户名不能为空',
        'password.require'=>'密码不能为空'

    ];
}