<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2017/12/28
 * Time: 14:45
 */

namespace app\admin\validate;


use think\Exception;
use think\Request;
use think\Validate;

class BaseValidate extends Validate
{
    public function goCheck(){
        $request = Request::instance()->param();
        $result = $this->batch()->check($request);
        if(!$result){
            $error = $this->error;
            $error = $this->changeArray($error);
            throw new Exception($error);
        }
        else{
            return true;
        }
    }

    public function changeArray($arr){
       return  is_array($arr) ? implode(';', $arr) : $arr;
    }
}