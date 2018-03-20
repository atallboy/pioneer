<?php
namespace app\admin\controller;

use think\Controller;
use think\Db;
use think\Exception;
use think\Request;
use app\admin\model\First_list as Model;
use app\admin\model\Second_list as SecondModel;

class Index extends Base{

	public function welcome(){
		return view('welcome');
	}

	public function login(){
        $data = Request::instance()->param();
        if($data){
            $data['password'] = md5($data['password']);
            $res = Db::table('administrator')
                    ->where('admin_name',$data['admin_name'])
                    ->where('password',$data['password'])
                    ->find();
			if(!$res['status']){
				$this->error('您的帐号已被停用，请联系网站管理员');
			}
           if($res){
			   $cookieValue = $this->encryptionCookie($res['validate']);
               $cookie = setcookie('cookieName',$cookieValue,time()+2*7*24*3600,'/');
               if($cookie){
                   $record['admin_id'] = $res['id'];
                   $record['login_time'] = date("Y-m-d H:i:s",intval(time()));
                   $result_record = Db::table('administrator_record')->insert($record);
                   if($result_record){
                       $result_admin = Db::table('administrator')
                           ->where('id',$res['id'])
                           ->update(['recent_time'=>$record['login_time']]);
                       if($result_admin){
                           return $this->redirect('index/index');
                       }
                   }
               }

           }
           else{
               return view('login');
           }
        }
		return view('login');
	}

	public function index(){
         $this->checkCookie();
		$validate = $this->decodeCookie();
		$name = Db::table('administrator')->where('validate',$validate)->column('admin_name');
	//	var_dump($name);die;
            return view('indexpp');
	}

	//添加一级栏目
	public function addFirstList(){
        $this->checkPermissions('addFirstList');
		$data = Request::instance()->param();
		if($data){
		//	$status = Db::table('first_list')->insert($data);
			unset($data['admin-role-save']);
			$model = new  Model($data);
			$status  =$model->allowField(true)->save();
			if($status==1){
				$this->success('添加成功');
			}else{
				$this->error('添加失败');
			}
		}
		return $this->fetch();
	}

	//添加二级栏目
	public function addSecondList(){

		$this->checkPermissions('addSecondList');
		$data = Request::instance()->param();
		if($data){
			if($data['pre_id']){
			$pre_id = Db::table('first_list')->where('name',$data['pre_id'])->column('id');
			$data['pre_id'] = $pre_id[0];}
		//	$status=Db::table('second_list')->insert($data);
			$model = new  SecondModel($data);
			$status  =$model->allowField(true)->save();
			if(!$status){
				$this->error('添加失败');
			}else{
				$this->success('添加成功');
			}
		}
		$data = Db::table('first_list')->column('name');
		return view('addSecondList',['name'=>$data]);
	}

	//查看已存在栏目
	public function haveList(){
		$this->checkPermissions('haveList');
			$arr = [];
			$dataA = Db::table('first_list')->select();
		    $dataB = Db::table('second_list')->select();//var_dump($dataA);var_dump($dataB);die;

		for($i=0;$i<count($dataA);$i++){
			$arr[$dataA[$i]['name']] =[];
			for($k=0;$k<count($dataB);$k++){
				if($dataA[$i]['id']==$dataB[$k]['pre_id']){
					$arr[$dataA[$i]['name']][]=$dataB[$k]['name'];
					$other[] =$dataB[$k]['name'];
				}
			}
		}
		$another = Db::table('second_list')->column('name');
		$re=array_merge(array_diff($other, array_intersect($other, $another)), array_diff($another, array_intersect($other, $another)));
		$arr['无上级栏目']=$re;
		return view('haveList',['data'=>$arr]);
	}

   //显示修改选项
	public function modifyList(){
		$this->checkPermissions('modifyList');
		$arr = [];
		$dataA = Db::table('first_list')->select();
		$dataB = Db::table('second_list')->select();
		for($i=0;$i<count($dataA);$i++){
			$arr[$dataA[$i]['name']] =[];
			for($k=0;$k<count($dataB);$k++){
				if($dataB[$k]['pre_id']==$dataA[$i]['id']){
					$arr[$dataA[$i]['name']][]=$dataB[$k]['name'];
					$other[] =$dataB[$k]['name'];
				}
			}
		}
		//var_dump($arr);die;
		$another = Db::table('second_list')->column('name');
		$re=array_merge(array_diff($other, array_intersect($other, $another)), array_diff($another, array_intersect($other, $another)));
		$arr['无上级栏目']=$re;
		return view('modifyList',['data'=>$arr]);
	}

	//具体修改页面
	public function alterList(){
		$this->checkPermissions('alterList');
		$result = Request::instance()->param();

		//点击删除执行以下代码
		if(array_key_exists('behavior',$result)&&$result['behavior']=='del'){
			switch($result['type']){
				case '1':$table = 'first_list';break;
				case '2':$table = 'second_list';break;
			}
			$res = Db::table($table)->where('name',$result['data'])->delete();
			$this->success('删除成功');
		}


		//修改数据填写后  提交至此步骤
		if(array_key_exists('behavior',$result)&&$result['behavior']=='modify'){
			if($result['type']==1){
				$res =Db::table('first_list')->where('id', $result['id'])
						                    ->update(['name' => $result['name'],'order_id'=>$result['order_id'],'final'=>$result['final']]);
				if($res== 1){
                    return $this->modifyList();
                }
			}
			elseif($result['type']==2){
					if($result['pre_id']!=='无上级'){
							$pre_id = Db::table('first_list')->where('name',$result['pre_id'])->column('id');
							foreach ($pre_id as $key=>$val){
							$re=$val;}
				}
					else{
							$re = 0;
				}

				$res=Db::table('second_list')->where('id', $result['id'])
						->update(['name' => $result['name'],'order_id'=>$result['order_id'],'final'=>$result['final'],'pre_id'=>$re]);
			//	var_dump($res);echo $re;die;
				if($res==1){
					$this->success('修改成功了','modifyList');
				}else{
					$this->error('修改失败');
				}
			}else{}
		}

		//初始修改  辨别表一或表二，然后去对应表查找数据
		if($result['type']==1){
			$data = Db::table('first_list')->where('name',$result['data'])->find();
			return view('editFirstList',['data'=>$data]);
		}
		elseif($result['type']==2){
			$data = Db::table('second_list')->where('name',$result['data'])->find();
			$name = Db::table('first_list')->where('id',$data['pre_id'])->column('name');
			if($name){
						foreach ($name as $key=>$val){$re=$val;}
						$data['pre_id'] = $re;
			}
		}
			else{$this->error('系统内部出现错误');}

				//type:1为first_list表，2为second_list表
			$data['type'] = $result['type'];
			$pre_list = Db::table('first_list')->column('name');
			$pre_list[]='无上级';
			if(empty($data['pre_id'])){
				$data['pre_id']='无上级';
			}

		return view('alterList',['data'=>$data,'name'=>$pre_list]);
	}


}