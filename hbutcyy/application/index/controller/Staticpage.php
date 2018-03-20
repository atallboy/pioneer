<?php
namespace app\index\controller;

use think\Controller;
use think\Db;
use think\Request;

class Staticpage extends Base
{	

	public function staticByAll(){
		$data = Db::table('second_list')->field(['id','name'])->select();
		return view('staticByAll',['data'=>$data]);
	}
	
	public function byAll(){
		$id = Request::instance()->param('id');
		$link = $this->getLink();
		$nav = $this->getNav();
		$second_list = Db::table('second_list')->where('id',$id)->field(['name','pre_id'])->find();
		$first_list = Db::table('first_list')->where('id',$second_list['pre_id'])->field('name')->find();
		$first_name = $first_list['name'];
		$name = $second_list['name'];
		
		$data = Db::table('detail')->where('from_id',$id)->field(['id','tittle'])->select();	//echo "<pre>";print_r($data);echo "<pre>";die;		
		for($i=0;$i<count($data);$i++){
			ob_start();	
			$data = Db::table('detail')->where('id',$data[0]['id'])
									->field(['id','from_id','tittle','author','summary','media','source','content','publish_time'])
									->select();
			 $this->assign('nav',$nav);
			  $this->assign('link',$link);
             $this->assign('name',$name);
             $this->assign('first_name',$first_name);
			 $this->assign('data',$data);
			require_once('../application/index/view/index/showDetail.html');
			 $fileName = './page/detail'.$data[0]['id'].'.html';
			 $data = file_put_contents($fileName, ob_get_contents()); 
			 
		} 	
	
	//	$this->success('生成成功','staticByAll','',0);
		//echo "<pre>";print_r($data);echo "<pre>";die;
	}

	public function staticByOne(){
		$data = Db::table('detail')->field(['id','tittle','from_id'])->select();
		
		//echo "<pre>";print_r($data);echo "<pre>";die;
		return view('staticByOne',['data'=>$data]);
	}
	
	public function getDetailData(){
			$nav = $this->getNav();
			$link = $this->getLink();
			$name = Db::table('second_list')->where('id',$data[0]['from_id'])->column('name');
			$name=$name[0];
			$pre_id = Db::table('second_list')->where('name',$name)->column('pre_id');
			$first_name = Db::table('first_list')->where('id',$pre_id[0])->column('name');			
			$first_name = $first_name[0];	
	}
	
	
	public function staticIng($id){
		
	}
	
	public function byOne(){
			$id = Request::instance()->param('id');
            ob_start();
			$nav = $this->getNav();
			$link = $this->getLink();
			$data = Db::table('detail')->where('id',$id)
									->field(['id','from_id','tittle','author','summary','source','media','content','publish_time'])
									->select();
			$name = Db::table('second_list')->where('id',$data[0]['from_id'])->column('name');
			$name=$name[0];
			$pre_id = Db::table('second_list')->where('name',$name)->column('pre_id');
			$first_name = Db::table('first_list')->where('id',$pre_id[0])->column('name');			
			$first_name = $first_name[0];
            $this->assign('nav',$nav);
             $this->assign('link',$link);
             $this->assign('name',$name);
             $this->assign('first_name',$first_name);
			 $this->assign('data',$data);
			// var_dump($name[0]);die;
			 require_once('../application/index/view/index/showDetail.html');
			 $fileName = './page/detail'.$id.'.html';
			 $data = file_put_contents($fileName, ob_get_contents()); 
			 ob_end_flush();		
			$this->success('生成成功','staticByOne','',0);
 		
	}

    public function index()
    {  
        $cookie = $this->checkCookie();
        if($cookie){//var_dump($_COOKIE);die;
            $user_name = base64_decode($_COOKIE['cookieUser']);
            $nav = $this->getNav();
            $news = $this->getNews();
            $company = $this->getCompany();
            $announcement = $this->getAnnouncement();
            $link = $this->getLink();
            $active = $this->getActive();
            $active = $active[0];
            return view('index',['nav'=>$nav,'active'=>$active,'link'=>$link,'company'=>$company,'user_name'=>$user_name,'news'=>$news,'announcement'=>$announcement]);
        }else{
            //echo(filemtime('index.shtml'));die;
           if(is_file('index.html') && (time() - filemtime('index.html')) < 3600000) { //设置缓存失效时间  
            require_once('index.html');  
        } else {             
           // ob_start();
            $nav = $this->getNav();
            $announcement = $this->getAnnouncement();
            $news = $this->getNews();
            $company = $this->getCompany();
            $link = $this->getLink();
            $active = $this->getActive();
            $active = $active[0];
           // echo "<pre>";print_r($active);echo "<pre>";die;
            // $this->assign('nav',$nav);
            // $this->assign('announcement',$announcement);
            // $this->assign('news',$news);
            // $this->assign('company',$company);
            // $this->assign('link',$link);
            // $this->assign('active',$active);
            // include('../application/index/view/index/index.html');
            // $data = file_put_contents('index.html', ob_get_contents());      
            return view('index',['nav'=>$nav,'active'=>$active,'link'=>$link,'company'=>$company,'news'=>$news,'announcement'=>$announcement]);
        }
    }
    }
	
	
	    public function getLink(){
        $id = Db::table('second_list')->where('name','所有链接')->column('id');
        $data = Db::table('detail')->where('from_id',$id[0])
            ->where('have_from',1)
            ->field(['id,tittle,source'])
            ->limit(4)
            ->select();
        return $data;
    }

 }