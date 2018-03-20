<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2018/1/4
 * Time: 10:29
 */

namespace app\index\controller;

use think\Db;
use think\Controller;
use think\Request;
use app\index\model\Apply as ApplyModel;
use app\admin\controller\Base as BaseController;

class Apply extends Base
{	

	public function checkTeamName(){
		$name = Request::instance()->param('name');
		$query = Db::table('apply')->where('team_name',$name)->find();
		if($query){
			echo 'exist';
		}else{
			echo 'none';
		}
	}


	public function del(){
		$id = Request::instance()->param('id');
		$res = Db::table('apply')->delete($id);
		if($res){$this->success('删除成功','showApply');}
		else{$this->error('删除失败');}		
	}
	
	
	public function detail(){
		$id = Request::instance()->param('id');
		$data = Db::table('apply')->where('id',$id)->find();
		//echo "<pre>";print_r($data);echo "<pre>";die;
		return view('detail',['data'=>$data]);
	}
	
	public function deal(){
		$id = Request::instance()->param('id');
		$data = Db::table('apply')->where('id',$id)->find();
		$judge =Db::table('grade')->where('item',$data['apply_name'])->field(['judger','grade','detail'])->select();
		//echo "<pre>";print_r($judge);echo "<pre>";die;
		$ave = 0;
		if(count($judge)){
		for($i=0;$i<count($judge);$i++){
			$ave+=$judge[$i]['grade'];
		}
		
		$ave=$ave/count($judge);}
		
		return view('deal',['data'=>$data,'judge'=>$judge,'ave'=>$ave]);
	}
	
	public function dealStatus(){
		$data = Request::instance()->param();
		//$data = Db::table('apply')->where('id',$id)->find();
		$res = Db::table('apply')->update(['status'=>$data['status'],'id'=>$data['id']]);
		if($res){$this->success('评审成功','showApply');}
		else{$this->error('评审失败');}

	}	
	
	
    public function judgeLook(){
        $data  = Db::table('apply')->select();
        return view('judgeLook',['data'=>$data]);
    }

    public function exportExcel(){

    }


    public function downFile(){
        $data = Request::instance()->param();
        $res = Db::table('apply')->where('id',$data['id'])->column($data['type']);

        $file_name = $res[0];     //下载文件名
        $file_dir = "../public/upload/file/";        //下载文件存放目录

        //检查文件是否存在
        $file_dir_name=iconv('UTF-8','GB2312',$file_dir . $file_name);
        if (! file_exists ($file_dir_name )) {
            echo "文件找不到";
            exit ();
        } else {
            //打开文件
            $file = fopen ( $file_dir_name, "r" );
            //输入文件标签
            Header ( "Content-type: application/octet-stream" );
            Header ( "Accept-Ranges: bytes" );
            Header ( "Accept-Length: " . filesize ( $file_dir_name ) );
            Header ( "Content-Disposition: attachment; filename=" . $file_name );
            //输出文件内容
            //读取文件内容并直接输出到浏览器

                die;
            echo fread ( $file, filesize ( $file_dir_name ) );
            fclose ( $file );
            exit ();
        }
    }

    public function addApply(){
	
		$res = $this->checkCookie();
		if(!$res){
			$this->error('请注册或登陆后再申请','../../index/user/login');
		}
		$name = $_COOKIE['cookieUser'];
        $name = base64_decode($name);
		$data = Db::table('user')->where('user_name',$name)->field('identification')->find();	
		if($data['identification']=='未认证'){
		//	$this->success('账号未认证，无法申请');
		}
        $nav = $this->getNav();
        return view('addApply',['nav'=>$nav]);
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

    public function showApply(){
        $base = new BaseController();
        $base->checkPermissions('showApply');
        $data  = Db::table('apply')->select();
		for($i=0;$i<count($data);$i++){
			if($data[$i]['register']==1){
				$data[$i]['register'] = '已注册';
			}else{
				$data[$i]['register'] = '未注册';
			}
		}
        return view('showApply',['data'=>$data]);
    }

    public function dealFile(){
	
		$team_name = Request::instance()->param('team_name');
		$query = Db::table('apply')->where('team_name',$team_name)->find();
		if($query){
			$this->error('该公司名已被提交申请，请更换');
		}
	
        if(!empty($_FILES)){//var_dump($_FILES);die;
            $data =[];
            foreach ($_FILES as $key=>$value){
                $data[$key] = $this->uploadFile($key);
            }
            $this->addApplyToDb($data);
        }
        else{
            $this->error('未提交文件，请重新提交');
        }
    }

    public function uploadFile($key){
//echo "<pre>";print_r($_FILES);echo "<pre>";die;
            $error = $_FILES[$key]['error'];
            $type = $_FILES[$key]['type'];
            $size = $_FILES[$key]['size'];
            $name = $_FILES[$key]["name"];
            //判断错误值
            if($error == 0){
                //判断文件类型
                if($type=='application/octet-stream'||$type=='image/jpeg'||$type=='img/jpg'||$type=='img/png'||$type=='text/plain'||$type=='application/msword'||$type=='application/pdf'||$type=='application/vnd.openxmlformats-officedocument.wordprocessingml.document'){
                    //判断文件大小
                    if($size>2*1012*1024){
                        $this->error('文件过大，不能上传大于2M的文件');
                    }else{

                            //处理乱码
                            $name=iconv("UTF-8","gb2312", $name);
                            //判断上传最终状态
                            if(move_uploaded_file($_FILES[$key]["tmp_name"], "upload/file/".$name)){
                                $name=iconv("gb2312","UTF-8", $name);
                                return $name;
                            }
                    }
                }else{
                    $this->error('文件格式不支持，请更换文件格式');
                }
            }else{
                $this->error('请同时上传申请表和计划书');
            }
    }

    public function addApplyToDb($data){
            $datas = Request::instance()->param();
            $data =  array_merge($datas,$data);
			$name = $_COOKIE['cookieUser'];
			$name = base64_decode($name);
			$id = Db::table('user')->where('user_name',$name)->field('id')->find();
			$data['user_id']=$id['id'];
            $model = new ApplyModel($data);
            $result = $model->allowField(true)->save();
            if($result){
                $this->success('申请成功，正前往个人中心','index/grade/judgeLook');
            }else{
                $this->error('申请失败，请重试');
            }
    }
}