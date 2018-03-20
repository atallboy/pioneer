<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2018/1/8
 * Time: 9:10
 */

namespace app\admin\controller;


use think\Controller;
use think\Db;
use think\Request;
use app\admin\model\ContentPublic as ContentPublicModel;


class ContentPublic extends Base
{
        public function showPublic(){
            $data = Db::table('content_public')->select();
            for ($i=0;$i<count($data);$i++){
                switch ($data[$i]['block']){
                    case 1:$data[$i]['block']='区域一';
                        break;
                    case 2:$data[$i]['block']='区域二';
                        break;
                    case 3:$data[$i]['block']='区域三';
                        break;
                }
            }

            return view('showPublic',['data'=>$data]);
        }

        public function addContentPublic(){
            $this->checkPermissions('addContentPublic');
            $res = Request::instance()->param();
            if($res){
                //判断新增还是更新
                $query = Db::table('content_public')->where('block',$res['block'])->find();
                if($query){
                    $model = new ContentPublicModel();
                    $result = $model->save(['second_list_id'=>$res['second_list_id']],['block'=>$res['block']]);
                    if($result){
                        $this->success('更改成功');
                    }
                    else{
                        $this->error('更改失败');
                    }

                }else{
                    $second_name =Db::table('second_list')->where('id',$res['second_list_id'])->column('name');
                    $res['second_list_name'] =$second_name[0];
                    $model = new ContentPublicModel();
                    $result = $model->allowField(true)->save($res);
                    if($result){
                        $this->success('操作成功');
                    }
                    else{
                        $this->error('操作失败');
                    }
                }

            }
            $data = Db::table('second_list')
                        ->field(['id','name'])
                        ->select();
         //   var_dump($data);die;
            return view('addContentPublic',['data'=>$data]);
        }
}