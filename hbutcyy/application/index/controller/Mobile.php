<?php
namespace app\index\controller;

use think\Controller;
use think\Db;
use think\Request;

class Mobile extends Base
{
	public function index(){
           if(is_file('mobile.html') && (time() - filemtime('mobile.html')) < 3600) { //设置缓存失效时间  
            require_once('mobile.html');  
        } else {             
            ob_start();	
            ob_clean();	
		$nav = $this->getSecond();
		$news = $this->getNews(8);
		$announcement = $this->getAnnouncement(8);
		$active = $this->getActive();
		$company = $this->getCompany(4);
            $this->assign('nav',$nav);
            $this->assign('news',$news);
            $this->assign('company',$company);
            $this->assign('announcement',$announcement);
            $this->assign('active',$active);
            include('../application/index/view/mobile/index.html');
        //    $data = file_put_contents('mobile.shtml', ob_get_contents());   

		// return view('index',['nav'=>$nav,'news'=>$news,'announcement'=>$announcement,'active'=>$active,'company'=>$company]);
	}
}


	public function login(){
		$nav = $this->getSecond();
		
		return view('login',['nav'=>$nav]);
	}

	public function category(){
		$nav = $this->getSecond();
		 $name = Request::instance()->param('name');
		 if($name=='新闻速递'){
			$data = $this->getNews(1000);
		 }elseif ($name=='通知公告') {
		 	$data = $this->getAnnouncement(1000);
		 }else{
		 	die;
		 }
			
		return view('list',['nav'=>$nav,'data'=>$data,'name'=>$name]);
	}

	public function nav(){
		
		$id = Request::instance()->param('id');
		$name = Db::table('second_list')->where('id',$id)->find();
		if ($name['name']=='所有链接') {
			$this->linkPage($id,$name);
		}
		$nav = $this->getSecond();
		//$name = Request::instance()->param('name');
		$data = Db::table('detail')->where('from_id',$id)->order('publish_time','desc')->field(['id,tittle,publish_time'])->select();
		    for($i=0;$i<count($data);$i++){
		        if(strlen($data[$i]['publish_time'])>10){
		            $data[$i]['publish_time']=substr($data[$i]['publish_time'],5,6);
		        }

		    }	
 //echo "<pre>";print_r($data);echo "<pre>";die;			
		return view('list',['nav'=>$nav,'data'=>$data,'name'=>$name['name']]);
	}
	
	public function linkPage($id,$name){
		$nav = $this->getSecond();
		//$name = Request::instance()->param('name');
		$data = Db::table('detail')->where('from_id',$id)->order('publish_time','desc')->field(['id,tittle,publish_time,source'])->select();
		    for($i=0;$i<count($data);$i++){

		            $data[$i]['publish_time']=substr($data[$i]['publish_time'],5,6);

		    }	
 //echo "<pre>";print_r($data);echo "<pre>";die;			
		return view('linkPage',['nav'=>$nav,'data'=>$data,'name'=>$name['name']]);
	}

	public function companyList(){
		$data = $this->getCompany(1000);
		$nav = $this->getSecond();
		return view('companyList',['nav'=>$nav,'company'=>$data,'name'=>'园区企业']);
	}

	public function activeList(){
		$nav = $this->getSecond();
		$data = $this->getActiveList();
		return view('activeList',['nav'=>$nav,'data'=>$data,'name'=>'园区活动']);
	}

	public function getDetail(){
		$nav = $this->getSecond();
		return view('getDetail',['nav'=>$nav]);
	}	
	
	public function detail(){
		 $nav = $this->getSecond();
		 $id = Request::instance()->param('id');
		 $data = Db::table('detail')->where('id',$id)->field(['tittle','content','source','publish_time','media','from_id'])->find();
		$list_name = Db::table('second_list')->where('id',$data['from_id'])->field('name')->find();
		// echo "<pre>";print_r($data);echo "<pre>";die;
		return view('getDetail',['data'=>$data,'nav'=>$nav,'list_name'=>$list_name['name']]);
	}

	public function active(){
		 $id = Request::instance()->param('id');
		 $data = Db::table('active')->where('id',$id)->find();//var_dump($data);die;
		return view('active',['data'=>$data]);		
	}

	public function company(){
		 $id = Request::instance()->param('id');
		 $data = Db::table('detail')->where('id',$id)->field(['tittle,content'])->find();
		return view('company',['data'=>$data]);		
	}

	public function getSecond(){
		$data = Db::table('second_list')->field(['id,name'])->select();
		return $data;
	}

    public function getNews($count){
    $data =Db::table('second_list')->where('name','新闻速递')->find();
    $news = Db::table('detail')->where('from_id',$data['id'])
                            ->where('have_from',1)
                            ->field(['id,tittle,publish_time'])
							->order('publish_time','desc')
                            ->limit($count)
                            ->select();
    for($i=0;$i<count($news);$i++){
            $news[$i]['publish_time']=substr($news[$i]['publish_time'],5,6);   
    }
    return $news;
    }

    public function getAnnouncement($count){
         $data =Db::table('second_list')->where('name','通知公告')->find();
        $data = Db::table('detail')->where('from_id',$data['id'])
                                    ->where('have_from',1)
                                    ->field(['id,tittle,publish_time'])
									->order('publish_time','desc')
                                    ->limit($count)
                                    ->select();
	    for($i=0;$i<count($data);$i++){
	        // if(strlen($data[$i]['tittle'])>51){
	        //     $data[$i]['tittle']=substr($data[$i]['tittle'],0,51);
	        // }
	        if(strlen($data[$i]['publish_time'])>10){
	            $data[$i]['publish_time']=substr($data[$i]['publish_time'],5,6);
	        }

	    }                                    
        return $data;
    }

        public function getActive(){
        $data = Db::table('active')->where('status','进行中')->limit(1)
                                    ->order('create_time','desc')
                                    ->field('id,name,address,time,detail')
                                    ->find();
       
            $count = strlen($data['detail']);
            if($count>=45){
                $data['detail'] = substr($data['detail'],0,45).'...';
            }
        return $data;
    }    

        public function getActiveList(){
        $data = Db::table('active')
                                    ->order('create_time','desc')
                                    ->field('id,name,time')
                                    ->select();
       
        return $data;
    }

    public function getCompany($count){
        $id = Db::table('second_list')->where('name','企业展播')->column('id');
        $data = Db::table('detail')->where('from_id',$id[0])
                            ->where('have_from',1)
                            ->limit($count)
                            ->field(['id,tittle,image'])
                            ->select();

        return $data;
    }    
}