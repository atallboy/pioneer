<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2018/2/1
 * Time: 15:05
 */

namespace app\index\controller;

use think\Db;
use think\Request;
use app\index\model\Activeapply as Model;

class file extends Base
{
    public function fileDownload(){
        $nav = $this->getHeader();
        $data = Db::table('file')->select();
//echo "<pre>";print_r($data);echo "<pre>";die;
        return view('fileDownload',['nav'=>$nav,'contentList'=>$data]);
    }

        public function getNav(){
        $nav = Db::table('first_list')->field(['id','name','order_id'])
                    ->order('order_id','asc')

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


}