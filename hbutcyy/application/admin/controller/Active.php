<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2018/1/31
 * Time: 23:27
 */

namespace app\admin\controller;
use app\admin\model\Active as Model;

use app\index\controller\Base;
use think\Db;
use think\Request;

class Active extends Base
{
    public function addActive(){
        $data = Request::instance()->param();
        if($data){
            $data['regular'] = $data['editorValue'];
            $model = new Model();
            $result = $model->allowField(true)->save($data);
            if($result){
                $this->success('操作成功','activeList');
            }
            else{
                $this->error('操作失败');
            }
        }
        return view('addActive');
    }

    public function activeList(){
        $data = Db::table('active')->select();
        for($i=0;$i<count($data);$i++){
            $count = Db::table('activeapply')->where('item',$data[$i]['id'])->select();
            $data[$i]['count'] = count($count);
        }
	//var_dump($data);die;
        return view('activeList',['data'=>$data]);
    }

    public function delApply(){
        $id = Request::instance()->param('id');
        $res = Db::table('activeapply')->delete($id);
        if($res){
            $this->success('删除成功');
        }else{
            $this->error('删除失败');
        }
    }
	
	public function editApply(){
		$id = Request::instance()->param('id');
		$data = Db::table('activeapply')->where('id',$id)->find();
		$name = Db::table('active')->where('id',$data['item'])->field('name')->find();
		$data['item']=$name['name'];		
		return view('editApply',['data'=>$data]);
	}
	
	public function dealActiveApply(){
		$data = Request::instance()->param();
		$res = Db::table('activeapply')->where('id',$data['id'])->update(['status'=>$data['status']]);
		if($res){
			$this->success('审批成功','applyList');
		}else{
			$this->error('审批失败');
		}
	}
	

    public function delActive(){
        $id = Request::instance()->param('id');
        $res = Db::table('active')->delete($id);
        if($res){
            $this->success('删除成功');
        }else{
            $this->error('删除失败');
        }
    }	
	
    public function activeDetail(){
        $id = Request::instance()->param('id');
        $data = Db::table('active')->where('id',$id)->select();
        var_dump($data);
    }

    public function editActive(){
        $id = Request::instance()->param('id');
        $data = Db::table('active')->where('id',$id)->select();
        return view('editActive',['data'=>$data[0]]);
    }

    public function updateActive(){
        $data = Request::instance()->param();
        $data['regular']=$data['editorValue'];
        $user = new Model();

        $res = $user->allowField(true)->save($data,['id' => $data['id']]);
        if($res){
            $this->success('更新成功','activeList');
        }else{
            $this->error('更新失败','activeList');
        }
    }

    public function applyList(){
        $data = Db::table('activeapply')->select();
		for($i=0;$i<count($data);$i++){
			$name = Db::table('active')->where('id',$data[$i]['item'])->field('name')->find();
			$data[$i]['item']=$name['name'];
		}
		
        return view('applyList',['data'=>$data]);
    }
	
	
	
	
	
	
	
	
	
	
	
	
	
	
}