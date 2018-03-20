<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2017/12/29
 * Time: 15:11
 */

namespace app\index\controller;


use app\index\validate\LoginValidate;
use app\index\validate\UserValidate;
use think\Controller;
use think\Db;
use think\Exception;
use think\Request;
use app\index\model\User as UserModel;
use app\admin\controller\Base as BaseController;
class User extends Controller
{
	public function editPassword(){
		$data = Request::instance()->param();
		$query = Db::table('user')->where('id',$data['id'])->where('password',md5($data['password']))->find();
		if($query){
			$user = new UserModel;
			$res  = $user->save(['password'=>md5($data['password1'])],['id'=>$data['id']]);
			if($res){
				return true;
			}else{
				echo '修改失败';
			}
		}else{
			echo '原密码错误';
		}
	}

	public function edit(){
		$data = Request::instance()->param();
		$user = new UserModel;
		$res  = $user->allowField(true)->save($data,['id'=>$data['id']]);
		if($res){
			return true;
		}else{
			return false;
		}
		
	}

    public function deleteCookie(){

        $res = setcookie("cookieUser", "", time()-3600,'/');
        if($res){
		header("Location: http://hbutcyy.dxsbb.com/"); 
            
        }}

    public function login(){
        $data = Request::instance()->param();
        if($data){
           if(empty($data['user_id'])||empty($data['password'])){
				$this->error('请输入账号和密码');
		   }
            $data['password'] = md5($data['password']);
            $query = Db::table('user')->where('user_id',$data['user_id'])
                                    ->where('password',$data['password'])
                                    ->find();
			
				
									
            if($query){
			if($query['status']==1){}else{$this->error('账号已被停用，请联系管理员');}
                $user_name = base64_encode($query['user_name']);
                $cookie = setcookie('cookieUser',$user_name,time()+2*7*24*3600,'/');
                if($cookie){
                    $record['user_id'] = $query['id'];
                    $record['login_time'] = date("Y-m-d H:i:s",intval(time()));
                    $result_record = Db::table('user_record')->insert($record);
                    if($result_record){
                        $result_user = Db::table('user')
                            ->where('id',$query['id'])
                            ->update(['recent_time'=>$record['login_time']]);
                        if($result_user){
                            //return $this->redirect('index/index');
							Header("Location: http://hbutcyy.dxsbb.com"); 
							
                        }
                    }
                }

            }
            else{
                $this->error('帐号或密码错误，请重新输入');
            }
        }
        else{
            return $this->fetch();
        }
    }
	
	public function checkUser(){
		$data = Request::instance()->param('name');
		$query = Db::table('user')->where('user_name',$data)->find();
		if($query){
			echo 'false';
			}else{
			echo 'ok';
		}
		
	}

    public function addUser(){
        $data = Request::instance()->param();
        if($data){
			if($data['password']!=$data['password2']){
				$this->error('两次密码不一致，请重新输入');
			}
			
            $query = Db::table('user')->where('user_name',$data['user_name'])->find();
            if($query){
                $this->error('此用户名已被注册，请更换');
            }
            $data['password'] = md5($data['password']);
            $model = new UserModel($data);
            $result = $model->allowField(true)->save();
            if($result){
                $this->success('注册成功，正在前往登录','index/user/login');
            }
            else{
            $this->error('注册失败，请重新注册');
            }
        }
        else{

        $nav = $this->getNav();
        return view('addUser',['nav'=>$nav]);
           
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
      

    public function dealData($data){
        for($i=0;$i<count($data);$i++){
            if($data[$i]['status']){
                $data[$i]['status'] = '已启用';
                $data[$i]['zt'] = '停用';
            }else{
                $data[$i]['status'] = '已停用';
                $data[$i]['zt'] = '启用';
            }
            switch($data[$i]['role']){
                case 'teacher':
                    $data[$i]['role']='教师';
                    break;
                case 'student':
                    $data[$i]['role']='学生';
                    break;
                case 'employee':
                    $data[$i]['role']='园区员工';
                    break;
                case 'july':
                    $data[$i]['role']='评委';
                    break;
                case 'null':
                    $data[$i]['role']='未选择';
            }

            switch($data[$i]['limit']){
                case '1':
                    $data[$i]['limit'] = '一级';
                    break;
                case '2':
                    $data[$i]['limit'] = '二级';
                    break;
                case 'null':
                    $data[$i]['role'] = '';
                    break;
            }
        }
        return $data;
    }

    public function showUser(){
        $base = new BaseController();
        $base->checkPermissions('showUser');
        $data = Db::table('user')
                        ->field(['id','user_name','sex','user_id','tel','email','role','create_time','status','limit'])
                        ->select();

        $data = $this->dealData($data);
        return view('showUser',['data'=>$data]);
    }

    public function controlUser(){
        $base = new BaseController();
        $base->checkPermissions('controlUser');
        $data = Request::instance()->param();
        if($data['status']=='已启用'){
           UserModel::where('id',$data['id'])->update(['status'=>0]);
            return $this->showUser();
        }else{
            UserModel::where('id',$data['id'])->update(['status'=>1]);
            return $this->showUser();
        }

    }

    public function controlPermission(){
        $base = new BaseController();
        $base->checkPermissions('controlPermission');
        $data  = Request::instance()->param();
        $info = Db::table('user')->where('id',$data['id'])->find();

        return view('permission',['data'=>$info]);
    }

    public function userPermission(){
        $base = new BaseController();
        $base->checkPermissions('userPermission');
        $data  = Request::instance()->param();
        if($data['id']){
           $res  = Db::table('user')->update(['limit' => $data['permission'],'id'=>$data['id']]);
            if($res == 1){
                return $this->showUser();
            }else{
                return view('404');
            }
        }
        else{
            return view('permission');
        }
    }

    public function adminUpdateUser(){
        $data = Request::instance()->param();
        $user = new UserModel();
        $res = $user->allowField(true)->save($data,['id' => $data['id']]);
        if($res){
            $this->success('更新成功','showUser');
        }else{
            $this->error('更新失败');
        }
    }
}