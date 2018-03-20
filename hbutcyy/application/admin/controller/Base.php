<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2018/1/3
 * Time: 21:59
 */

namespace app\admin\controller;


use think\Controller;
use think\Db;


class Base extends Controller
{


    public function encryptionValidate(){
        $string = md5(rand(100,999).time().rand(100,999));
        return $string;
    }

    public function encryptionCookie($data){
            $salt = 'fadghf164dfg';
            $value = base64_encode($salt.$data);
        return $value;
    }

    public function decodeCookie(){
        $salt = 'fadghf164dfg';
        $res = $_COOKIE;
        $value = base64_decode($res['cookieName']);
        $value = substr($value,12);
        return $value;
    }

    public function checkCookie(){
        $salt = 'fadghf164dfg';
        $res = $_COOKIE;
        if(array_key_exists('cookieName',$res)&&!empty($res['cookieName'])){
            $value = base64_decode($res['cookieName']);
            $value = substr($value,12);
            $query = Db::table('administrator')->where('validate',$value)->column('id');
            if($query){
                return true;
            }else{
                $this->redirect('Index/login');
            }
        }
        else{
            $this->redirect('Index/login');
        }
    }

    public function checkPermissions($method){
        $salt = 'fadghf164dfg';
        $res = $_COOKIE;
        if(array_key_exists('cookieName',$res)&&!empty($res['cookieName'])){
            $value = base64_decode($res['cookieName']);
            $value = substr($value,12);
            $query = Db::table('administrator')->where('validate',$value)->column('level');
            if($query){
                if($query[0]=='3'){
                    return true;
                }
                $this->checkLimit($query[0],$method);
            }else{
                $this->redirect('Index/login');
            }
        }
        else{
            $this->redirect('Index/login');
        }
    }

    public function checkLimit($level,$method){

     $limit = [
        '1'=>['addFirstList','addSecondList','haveList','alterList','modifyList',
            'detail','addDetail','showDetail','modify','alterList','editList','submitUpdateData',],
        '2'=>['addFirstList','addSecondList','haveList','alterList','modifyList',
                'detail','addDetail','deleteDetail','showDetail','modify','alterList','editList','submitUpdateData',
               'addContentPublic','controlUser','controlPermission','userPermission',
                'showUser'],
    ];

            if(in_array($method,$limit[$level])){
                return true;
            }
            else{
                $this->error('抱歉，您没有该权限','admin/index/welcome');
            }
    }



    public function uploadImg(){
        if($_FILES['img']['error']=='0'){
            $data =[];
            foreach ($_FILES as $key=>$value){
                $data[$key] = $this->uploadFile($key);
            }
           return $data['img'];
        }else{
            $this->error('请添加图片');
        }
    }


    public function uploadFile($key){

        $type = $_FILES[$key]['type'];
        $size = $_FILES[$key]['size'];
        $name = $_FILES[$key]["name"];

        //判断文件类型
        if($type=='image/jpeg'||$type=='img/jpg'||$type=='image/png'){
            //判断文件大小
            if($size>2*1012*1024){
                $this->error('文件过大，不能上传大于2M的文件');
            }else{
                $rand = rand(1000,9999);
                $name = $rand.$name;
                //处理乱码
                $name=iconv("UTF-8","gb2312", $name);
                //判断上传最终状态
                if(move_uploaded_file($_FILES[$key]["tmp_name"], "upload/image/detail/".$name)){
                    $name=iconv("gb2312","UTF-8", $name);
                    return $name;
                }
            }
        }else{
            $this->error('文件类型只能为jpg,jpeg或png格式');
        }

    }


}