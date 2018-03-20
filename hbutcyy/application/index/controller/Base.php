<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2018/1/5
 * Time: 20:03
 */

namespace app\index\controller;


use think\Controller;
use think\Db;

class Base extends Controller
{
    public function getHeader(){
            $nav = $this->getNav();
            //echo "<pre>";print_r($active);echo "<pre>";die;
            return $nav;
    }


    protected function getNav(){
        $nav = Db::table('first_list')->field(['id','name','order_id'])
                    ->order('order_id','asc')
                    ->limit(9)
                    ->select();

        foreach($nav as $key=>$value){
            $data[$value['name']] = Db::table('second_list')->where('pre_id',$value['id'])
                                                    ->where('final','yes')
                                                    ->field(['id','name','order_id',])
                                                    ->order('order_id','asc')
                                                    ->select();
        }
        return $data;
    }

    public function checkCookie(){
        $res = $_COOKIE;//var_dump($res);die;
        if(array_key_exists('cookieUser',$res)&&!empty($res['cookieUser'])){
            return true;
        }
        else{
            return false;
        }
    }

    public function checkCookieToMy(){
        $res = $_COOKIE;//var_dump($res);die;
        if(array_key_exists('cookieUser',$res)&&!empty($res['cookieUser'])){
            return true;
        }
        else{
            $this->error('请登录','../../index/user/login');
        }
    }
}