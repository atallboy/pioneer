<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2018/1/4
 * Time: 10:29
 */

namespace app\admin\controller;

use think\Db;
use think\Controller;
use think\Request;
use app\admin\model\File as FileModel;
use app\admin\controller\Base as BaseController;

class File extends Base
{

    public function fileList(){
        $data = Db::table('file')->select();

        return view('fileList',['data'=>$data]);
    }
	
	
	public function del(){
		$id = Request::instance()->param('id');
		$query = Db::table('file')->where('id',$id)->find();
		$path = './upload/file/admin/'.$query['file']; 
		if(!file_exists($path)){
			$res = FileModel::destroy($id);
			$this->success('文件不存在或已删除');
		}
		if(!unlink(iconv('utf-8','gbk',$path))){$this->error('删除失败');}
		else{
		$res = FileModel::destroy($id);
		if($res){
			$this->success('删除成功','fileList');
		}else{
			$this->error('删除失败');
		}		
		}

	}
	
	public function editPage(){
		$data = Request::instance()->param();
		
		$path = './upload/file/admin/'.$data['name']; //echo $path;die;
		if(!file_exists(iconv('utf-8','gbk',$path))){
			$this->error('文件不存在或已删除');
		}else{		

		return view('editName',['data'=>$data]);
		}
	}
	
	public function editName(){
		$data = Request::instance()->param();
		$path = './upload/file/admin/';	
		$final = strstr($data['oldname'],'.');
			$result = rename(iconv('utf-8','gbk',$path.$data['oldname']),iconv('utf-8','gbk',$path.$data['name'].$final));
			if($result){
				$res = FileModel::where('id',$data['id'])->update(['file_name'=>$data['name'],'file'=>$data['name'].$final]);

				if($res){
					$this->success('更改成功','fileList');
				}else{
				$this->error('更改失败');}
			}
		return view('editName',['data'=>$data]);
		
	}
	
	public function editFilePage(){
		$data = Request::instance()->param();
		return view('editFile',['data'=>$data]);
	}
	
	public function editFile(){
		$data = Request::instance()->param();//echo "<pre>";print_r($data);echo "<pre>";die;
		if($_FILES['file']['error']==4){
			$file = new FileModel();
			$res = $file->allowField(true)->save($data,['id'=>$data['id']]);
			if($res){
				$this->success('更改成功','fileList');}
			else{
				$this->error('更改失败');
			}
		}else{
		$path = './upload/file/admin/'.$data['oldfile']; 
		if(file_exists(iconv('utf-8','gbk',$path))){
			$res=unlink(iconv('utf-8','gbk',$path));
			if(!$res){
	
			}
		}
			
		$name=iconv("UTF-8","gb2312", $_FILES['file']['name']);                    
		if(move_uploaded_file($_FILES['file']["tmp_name"], "upload/file/admin/".$name)){
			$data['file']=iconv("gb2312","UTF-8", $name);	
			$file = new FileModel();
			$res = $file->allowField(true)->save($data,['id'=>$data['id']]);
			if($res){
				$this->success('更改成功','fileList');}
			else{
				$this->error('更改失败');
			}					
		}			
		}

		
	}

    public function upload(){
        return view('upload');
    }

    public function judgeLook(){
        $data  = Db::table('apply')->select();
        return view('judgeLook',['data'=>$data]);
    }

    public function exportExcel(){

    }

	
	public function down(){
        $data = Request::instance()->param();

        $file_name = $data['name'];     //下载文件名
        $file_dir = "./upload/file/";        //下载文件存放目录
	
	    $filename=iconv('utf-8', 'gb2312', $file_name);
        $path=$file_dir.$filename;
        if(!file_exists($path)){//检测文件是否存在
            echo "文件不存在！";
            die();}

        $fp=fopen($path,'r');//只读方式打开
        $filesize=filesize($path);//文件大小

        //返回的文件(流形式)
        header("Content-type: application/octet-stream");
        //按照字节大小返回
        header("Accept-Ranges: bytes");
        //返回文件大小
        header("Accept-Length: $filesize");
        //这里客户端的弹出对话框，对应的文件名
        header("Content-Disposition: attachment; filename=".$filename);
        //================重点====================
        ob_clean();
        flush();
        //=================重点===================
        //设置分流
        $buffer=1024;
        //来个文件字节计数器
        $count=0;
        while(!feof($fp)&&($filesize-$count>0)){
            $data=fread($fp,$buffer);
            $count+=$data;//计数
            echo $data;//传数据给浏览器端
        }

        fclose($fp);
	}

    public function downFile(){
        $data = Request::instance()->param();

        $file_name = $data['name'];     //下载文件名
        $file_dir = "./upload/file/admin/";        //下载文件存放目录

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
        return view('showApply',['data'=>$data]);
    }

    public function dealFile(){
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
			$pre_name = Request::instance()->param('file_name');
			//echo "<pre>";print_r($data);echo "<pre>";die;
            $error = $_FILES[$key]['error'];
            $type = $_FILES[$key]['type'];//echo $type;die;
            $size = $_FILES[$key]['size'];
           $name = $_FILES[$key]["name"];
		//   $final_name = strstr($name,'.');
		 //  $name = $pre_name.$final_name;
            //判断错误值
            if($error == 0){
                //判断文件类型
                if($type=='application/octet-stream'||$type=='image/jpeg'||$type=='img/jpg'||$type=='text/plain'||$type=='application/vnd.openxmlformats-officedocument.wordprocessingml.document'||$type=='application/msword'||$type=='application/pdf'){
                    //判断文件大小
                    if($size>10*1012*1024){
                        $this->error('文件过大，不能上传大于10M的文件');
                    }else{
                           // $rand = rand(1000,9999);
                           // $name = "upload/file/" . $rand.$name;
                            //处理乱码
                            $name=iconv("UTF-8","gb2312", $name);
                            //判断上传最终状态
                            if(move_uploaded_file($_FILES[$key]["tmp_name"], "upload/file/admin/".$name)){
                                $name=iconv("gb2312","UTF-8", $name);
                                return $name;
                            }
                    }
                }else{
                    $this->error('文件类型允许为doc/docx/txt等格式');
                }
            }else{
                $this->error('请选择文件');
            }
    }

    public function addApplyToDb($data){
            $datas = Request::instance()->param();
            $data =  array_merge($datas,$data);
            $model = new FileModel($data);
            $result = $model->allowField(true)->save();
            if($result){
                $this->success('新增成功');
            }else{
                $this->error('申请失败，请重试');
            }
    }
}