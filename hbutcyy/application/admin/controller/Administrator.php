<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2017/12/28
 * Time: 9:38
 */

namespace app\admin\controller;


use app\admin\validate\AdministratorValidate;
use app\lib\exception\AdministratorException;
use think\Controller;
use think\Db;
use think\Exception;
use think\Request;
use app\admin\model\Administrator as Model;


class Administrator extends Base
{
    public function showAdministrator(){
        $this->checkPermissions('showAdministrator');
        $result = Db::table('administrator')->select();
        $result = $this->dealLevelAndStatus($result);

        return view('showAdministrator',['data'=>$result]);
    }

    public function addPage(){
        $this->checkPermissions('addPage');
        return view('addAdministrator');
    }

    public function dealLimit($data){

        //处理插入数据库的权限格式
        $arr = [];
        if(array_key_exists('limit_list',$data)){
            $arr[] = $data['limit_list'];
        }
        if(array_key_exists('limit_article',$data)){
            $arr[] = $data['limit_article'];
        }
        if(array_key_exists('limit_user',$data)){
            $arr[] = $data['limit_user'];
        }
        if(array_key_exists('limit_admin',$data)){
            $arr[] = $data['limit_admin'];
        }
      return  $res['limit'] = implode('-',$arr);
    }

    public function  addAdministrator(){
        $this->checkPermissions('addAdministrator');
               (new AdministratorValidate())->goCheck();

                $data = Request::instance()->param();

                $res['limit'] =$this->dealLimit($data);

                $res['admin_name'] = $data['admin_name'];
                $res['password'] = md5($data['password']);
                $res['level'] = $data['level'];
                $res['tel'] = $data['tel'];
                $res['email'] = $data['email'];
                $res['status'] = $data['status'];
                $res['remark'] = $data['remark'];

                $res['validate'] = $this->encryptionValidate();


//                //下列方法返回一个对象
//                //  $query = Model::create($res);

                $user = model('Administrator');
                $user->data($res);
                $query =  $user->save();
                if($query==1){
                    return $this->showAdministrator();
                    }
                else{
                    throw new Exception('添加失败');
                }



        return $this->fetch();
    }

    //填写修改数据后提交到数据库进行更改
    public function updateAdministrator(){
        $this->checkPermissions('updateAdministrator');
        (new AdministratorValidate())->goCheck();
        $data = Request::instance()->only(['id','admin_name','password','status','tel','email','level','remark']);
//var_dump($data);die;
        $password = Db::table('administrator')->where('id',$data['id'])->column('password');
        if($data['password']==$password['0']){
            unset($data['password']);
            Model::update($data);
         return  $this-> editAdministrator();
        }else{

            $data['password'] = md5($data['password']);
             Model::update($data);
            return  $this-> editAdministrator();
        }


    }

    //点击大表单页面的修改按钮后进入具体修改页面
    public function editPage(){
        $this->checkPermissions('editPage');
        $id = Request::instance()->param('id');
        $data = Db::table('administrator')->where('id',$id)->find();
    // var_dump($data);die;
        return view('editPage',['data'=>$data]);
    }


    public function dealLevelAndStatus($result){
        for($i=0;$i<count($result);$i++){
            switch ($result[$i]['level']){
                case 1:
                    $result[$i]['level'] = '普通管理员';
                    break;
                case 2:
                    $result[$i]['level'] = '高级管理员';
                    break;
                case 3:
                    $result[$i]['level'] = '超级管理员';
                    break;
                default:
                    $result[$i]['level'] = '未设置';
            }

            switch ($result[$i]['status']){
                case 1:
                    $result[$i]['status'] = '已启用';
                    break;
                case 0:
                    $result[$i]['status'] = '已停用';
                    break;
                default:
                    $result[$i]['status'] = '未设置';
            }
        }
        return $result;
    }

    //进入含有修改按钮的大表单页面
    public function  editAdministrator(){
        $this->checkPermissions('editAdministrator');
        $result = Db::table('administrator')->select();
        $result = $this->dealLevelAndStatus($result);
        return view('editAdministrator',['data'=>$result]);

//        $result =Model::edit();
//        if(!$result){
//            throw new AdministratorException();
//        }
////        return $result;
//        return $this->fetch();
    }

    public function deleteAdministrator(){
        $this->checkPermissions('deleteAdministrator');
            $id = Request::instance()->param('id');
            $model = Model::get($id);
            $model->delete();
        return  $this-> editAdministrator();
    }

}