<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2018/1/5
 * Time: 16:50
 */

namespace app\admin\controller;


use think\Controller;
use think\Db;
use think\Request;
use app\admin\model\Image as ImageModel;

class image extends Controller
{
    public function showImage(){
        $data = Db::table('image')->field(['image_name','id','url'])->select();
        foreach ($data as $key=>$value){
            $data[$key]['url'] = "/upload/image/".$value['url'];
        }
        return view('showImage',['data'=>$data]);
    }

    public function addImage(){
        return view('addImage');
    }


    public function dealFile(){
        if($_FILES['url']['error']=='0'){
            $data =[];
            foreach ($_FILES as $key=>$value){
                $data[$key] = $this->uploadFile($key);
            }
            $this->addApplyToDb($data);
        }else{
            $this->error('请添加图片');
        }
    }


    public function uploadFile($key){

        $type = $_FILES[$key]['type'];
        $size = $_FILES[$key]['size'];
        $name = $_FILES[$key]["name"];

            //判断文件类型
            if($type=='image/jpeg'||$type=='img/jpg'){
                //判断文件大小
                if($size>2*1012*1024){
                    $this->error('文件过大，不能上传大于2M的文件');
                }else{
                     $rand = rand(1000,9999);
                     $name = $rand.$name;
                    //处理乱码
                    $name=iconv("UTF-8","gb2312", $name);
                    //判断上传最终状态
                    if(move_uploaded_file($_FILES[$key]["tmp_name"], "upload/image/".$name)){
                        $name=iconv("gb2312","UTF-8", $name);
                        return $name;
                    }
                }
            }else{
                $this->error('文件类型只能为jpg格式');
            }

    }

    public function addApplyToDb($data){
        $datas = Request::instance()->param();
        $data =  array_merge($datas,$data);//var_dump($data);die;
        $model = new ImageModel($data);
        $result = $model->allowField(true)->save();
        if($result){
            $this->success('新增成功');
        }else{
            $this->error('申请失败，请重试');
        }
    }
}