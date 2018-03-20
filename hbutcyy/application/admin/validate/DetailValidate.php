<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2018/1/10
 * Time: 20:11
 */

namespace app\admin\validate;


use think\Validate;

class DetailValidate extends Validate
{
    protected $rule = [
        'tittle'=>'require',
        'order_id'=>'number'
    ];

    protected $message = [
        'tittle'=>'标题为必填项',
        'order_id'=>'次序必须为正整数，或可不填'
    ];
}