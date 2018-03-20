<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2017/12/28
 * Time: 16:31
 */

namespace app\lib\exception;


class AdministratorException extends BaseException
{
    //http状态码
    public $code = 404;

    //错误具体信息
    public $msg = '管理员操作错误';

    //自定义的错误代码
    public $errorCode = 90000;
}