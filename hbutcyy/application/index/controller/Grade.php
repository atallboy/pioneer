<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2018/2/1
 * Time: 16:04
 */

namespace app\index\controller;



use think\Db;
use think\Request;
use app\index\model\Grade as Model;

class Grade extends Base
{
    public function checkLevel(){
        $this->checkCookieToMy();
        $name = $_COOKIE['cookieUser'];
        $name = base64_decode($name);
            return $name;

    }

    public function judgeLook(){

            $name = $this->checkLevel();
			$data = Db::table('user')->where('user_name',$name)->field(['id','user_name','user_id','identification','sex','role','sex','age','tel','image','email','school','grade','create_time'])->find();
			$login_record = Db::table('user_record')->where('user_id',$data['id'])->select();
			$apply = Db::table('apply')->where('user_id',$data['id'])->field(['apply_name','status','team_name','create_time'])->select();
			if(count($apply)){
				for($i=0;$i<count($apply);$i++){
					if($apply[$i]['status']==1){
						$apply[$i]['status']='通过';
					}elseif($apply[$i]['status']==2){
						$apply[$i]['status']='待定';
					}elseif($apply[$i]['status']==3){
						$apply[$i]['status']='待处理';
					}else{
						$apply[$i]['status']='淘汰';
					}
				}
			}
			
			$active = Db::table('activeapply')->where('user_id',$data['id'])->select();
		for($i=0;$i<count($active);$i++){
			$name = Db::table('active')->where('id',$active[$i]['item'])->field('name')->find();
			$active[$i]['item']=$name['name'];
		}			
	//echo "<pre>";print_r($active);echo "<pre>";die;
           return view('user/page_v1',['data'=>$data,'login_record'=>$login_record,'apply'=>$apply,'active'=>$active]);

    }
	
	public function checkUser(){
		$name = $_COOKIE['cookieUser'];
        $name = base64_decode($name);
		$data = Db::table('user')->where('user_name',$name)->field('level')->find();
		if($data['level']==3){
		return true;}
		else{$this->error('你没有权限访问');}
	}
	
	public function applyList(){
				$name = $this->checkLevel();	
				$this->checkUser();
				$nav = $this->getNav();
	        $data  =Db::table('apply')->select();
			$count = count($data);
            for($i=0;$i<count($data);$i++){
                $grade = Db::table('grade')->where('judger',$name)
                    ->where('item',$data[$i]['apply_name'])
                    ->find();
					if(empty($grade['grade'])){
					$data[$i]['grade'] = '未评';}
					else{
                $data[$i]['grade']=$grade['grade'];}
			
            }
		for($i=0;$i<count($data);$i++){
			if($data[$i]['register']==1){
				$data[$i]['register'] = '已注册';
			}else{
				$data[$i]['register'] = '未注册';
			}
		}			
		return view('judgeLook',['nav'=>$nav,'data'=>$data,'count'=>$count]);
	}
	
	

    public function judge(){
        $this->checkCookieToMy();
        $id = Request::instance()->instance()->param('id');
        $name = Db::table('apply')->where('id',$id)->column('team_name');
        return view('judge',['id'=>$name[0]]);
    }

    public function addGrade(){
        $this->checkCookieToMy();
		$this->checkUser();
        $name = $_COOKIE['cookieUser'];
        $name = base64_decode($name);
        $data = Request::instance()->param();
		if(empty($data['grade'])||!is_numeric($data['grade'])){
			$this->error('分数必须为整形数字');
		}
        $data['judger'] = $name;
		//判断是更新还是新增
		$query = Db::table('grade')->where('item',$data['item'])->where('judger',$data['judger'])->find();
		if($query){
			$res = Db::table('grade')->where('item',$data['item'])->where('judger',$data['judger'])->update(['grade'=>$data['grade'],'detail'=>$data['detail']]);
			if($res){
				$this->success('更改评分成功','../../index/Grade/applyList');
			}else{
				$this->error('更改评分失败');
			}
		}
		else{
        $model = new Model();
        $result = $model->allowField(true)->save($data);
        if($result){
            $this->success('评分成功','../../index/Grade/applyList');
        }
        else{
            $this->error('评分失败');
        }
    }
	}
}