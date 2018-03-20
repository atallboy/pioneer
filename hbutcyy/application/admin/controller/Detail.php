<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2017/12/26
 * Time: 19:39
 */

namespace app\admin\controller;


use think\Controller;
use think\Db;
use think\Request;
use app\admin\model\Detail as DetailModel;
use app\admin\validate\DetailValidate as DetailValidate;

class Detail extends Base
{
    public function test(){
        return 'ok';
    }

    public function detail(){
        $this->checkPermissions('detail');
        $data = Db::table('detail')->select();//var_dump($data);die;
        $total = count($data);
        // 处理转换数据，提供给前端一目了然的文字
        $data = $this->changeData($data);

        return  view('detailList',['data'=>$data,'total'=>$total]);
        //return  view('list',['data'=>$data,'total'=>$total]);
    }

    public function checkDetail($res){
        $validate = new DetailValidate();
        if(!$validate->check($res)){
            $this->error($validate->getError());
        }
    }

    public function addDetail(){
        $this->checkPermissions('addDetail');
        $res = Request::instance()->param();
        if($res){
            $this->checkDetail($res);
            if($_FILES['img']['name']){
                $res['image'] = $this->uploadImg();
            }
            $res['from_list'] = 'second_list';
            $status_b = Db::table('second_list')->where('name',$res['from_id'])->column('id');
            if($status_b[0]){
                $res['from_id'] = $status_b[0];
            }else{
                return view('public/404',['msg'=>'出现错误']);
            }

            if(array_key_exists('editorValue',$res)){
                $res['content'] = $res['editorValue'];
                unset($res['editorValue']);
            }
            //处理是否添加发布时间


            $model = new DetailModel($res);
            $status = $model->allowField(true)->save();
            if($status==1){
                return $this->detail();
            }else{
                return false;
            }

        }
        $first = Db::table('first_list')->column('name');
        $second = Db::table('second_list')->column('name');
        $arr = $this->dealFirstAndSecond();
        return view('addDetail',['first'=>$first,'second'=>$second,'data'=>$arr]);

    }

    public function deleteDetail(){
        $this->checkPermissions('deleteDetail');
        $id = Request::instance()->param('id');
     //   var_dump($id);die;
        $res = Db::table('detail')->where('id',$id)->delete();
        if($res==1){
            return $this->detail();
        }else{
            return view('public/404',['msg'=>'删除过程中可能发生了意想不到的问题']);
        }
    }

    public function showDetail(){
        $this->checkPermissions('showDetail');
            $id = Request::instance()->param('id');
            $data = Db::table('detail')->where('id',$id)->select();//var_dump($data);die;
            return view('showDetail',['data'=>$data]);
    }

    public function dealFirstAndSecond(){

        $arr = [];
        $first = Db::table('first_list')->field(['id','name'])->select();

        for($i=0;$i<count($first);$i++){
            $arr[$first[$i]['name']] = Db::table('second_list')->where('pre_id',$first[$i]['id'])->column('name');
        }
      //  echo "<pre>";print_r($arr);echo "<pre>";
        return $arr;
    }

    public function modify(){
        $this->checkPermissions('modify');
        $res = Request::instance()->param();
        if($res){
            $res['from_list'] = 'second_list';
            $status_b = Db::table('second_list')->where('name',$res['from_id'])->column('id');
            if($status_b[0]){
                $res['from_id'] = $status_b[0];
            }else{
                echo 'fales';die;
            }

            $status = Db::table('detail')->where('id',$res['id'])->update($res);
            if($status == 1){
                $first = Db::table('first_list')->column('name');
                $second = Db::table('second_list')->column('name');
                return  view('addDetail',['first'=>$first,'second'=>$second]);
            }else{
                return false;
            }

        }
    }

    public function changeData($data){
        $i = 0;
        foreach ($data as $value){
            //转换have_from字段
            switch ($value['have_from']){
                case '0':$data[$i]['have_from']='草稿';break;
                case '1':$data[$i]['have_from']='发布';break;
            }

            //转换类型字段
            switch ($value['type']){
                case '1':$data[$i]['type']='原创';break;
                case '2':$data[$i]['type']='转载';break;
                case '3':$data[$i]['type']='其它';break;
            }
      //      var_dump($data);die;
            //转换from_id字段
            $result = Db::table($value['from_list'])->where('id',$value['from_id'])->column('name');;
            foreach($result as $key=>$val){
                $da = $val;
            }
            $data[$i]['from_id'] = $da;
            //转换from_list字段
            switch ($value['from_list']){
                case 'first_list':$data[$i]['from_list']='一级栏目';break;
                case 'second_list':$data[$i]['from_list']='二级栏目';break;
            }
            $i++;
        }
             return $data;
    }

    public function alterList(){
        $this->checkPermissions('alterList');
        //从侧边栏点击修改内容后执行以下代码
        $data = Db::table('detail')->select();
        $total = count($data);
        // 处理转换数据，提供给前端一目了然的文字
        $data = $this->changeData($data);
        return  view('editList',['data'=>$data,'total'=>$total]);
    }

    public function editList(){
        $this->checkPermissions('editList');
        //点击修改后执行以下代码进入具体修改页面
        $res = Request::instance()->param();
        if(array_key_exists('id',$res)&&$res['id']){
            $result = Db::table('detail')->where('id',$res['id'])->find();
            $data = Db::table('second_list')->where('id',$result['from_id'])->column('name');
            $res = $data[0];
            $second = Db::table('second_list')->column('name');
            return view('editDetail',['data'=>$result,'second'=>$second,'second_name'=>$res]);
        }

        //从侧边栏点击修改内容后执行以下代码
        $data = Db::table('detail')->select();
        $total = count($data);
        // 处理转换数据，提供给前端一目了然的文字
        $data = $this->changeData($data);

        return  view('editList',['data'=>$data,'total'=>$total]);
    }

    public function submitUpdateData(){
        $this->checkPermissions('submitUpdateData');
        $data = Request::instance()->param();

        if(!$_FILES['img']['error']){
            $data['image'] = $this->uploadImg();
        }
        //转换from_id
        $query = Db::table('second_list')->where('name',$data['from_id'])->column('id');
        $data['from_id'] = $query[0];
        $data['content'] = $data['editorValue'];
        $id = $data['id'];
          unset($data['id']);
        unset($data['editorValue']);

        // if($data['have_from']){
        //     $data['publish_time'] = date("Y-m-d H:i:s",intval(time()));
        // }
        $model = new DetailModel();
        $result = $model->allowField(true)->save($data,['id'=>$id]);
        if($result){
			//$res = unlink('./page/'.$id.'.html');
		
            return $this->detail();
        }
        else{
            return view('public/404',['msg'=>'修改过程中可能发生了意想不到的问题']);
        }


    }





}