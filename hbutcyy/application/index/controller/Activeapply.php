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

class Activeapply extends Base
{
    public function getMore(){
        $nav = $this->getHeader();
        $data = Db::table('active')->select();
//echo "<pre>";print_r($data);echo "<pre>";die;
        return view('more',['nav'=>$nav,'contentList'=>$data,'name'=>'所有活动']);
    }

    public function addApply(){

        $data = Request::instance()->param();
        if(count($data)==1){
            $id = $data['id'];
             $nav = $this->getNav();
			 $data = Db::table('active')->where('id',$id)->field('name')->find();
            return view('addApply',['id'=>$id,'nav'=>$nav,'name'=>$data['name']]);
        }else{
            if($data){
				//var_dump($_COOKIE);die;
				$name = base64_decode($_COOKIE['cookieUser']);
				$uid = Db::table('user')->where('user_name',$name)->field('id')->find();
				$data['user_id'] = $uid['id'];
                $model = new Model();
                $result = $model->allowField(true)->save($data);
                if($result){
                   $this->error('报名成功','index/grade/judgeLook');
                }
                else{
                    $this->error('报名失败');
                }
            }
        }

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

    public function showDetail(){
        $id = Request::instance()->param('id');
        $data = Db::table('active')->where('id',$id)->find();
        $list = Db::table('active')->field(['name','id'])->select();
        for($i=0;$i<count($list);$i++){
            if(strlen($list[$i]['name'])>51){
                $list[$i]['name'] = substr($list[$i]['name'],0,51);
            }
        }
        $nav = $this->getHeader();

       return view('showDetail',['nav'=>$nav,'data'=>$data,'list'=>$list,'name'=>$data['name']]);
    }
}