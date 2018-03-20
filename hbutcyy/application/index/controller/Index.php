<?php
namespace app\index\controller;

use think\Controller;
use think\Db;
use think\Request;

class Index extends Base
{

    public function article(){
        $id = Request::instance()->param('id');
		$path = './page/'.$id.'.html';
	//	if(is_file($path)){
		//	require_once($path);  
	//	}	
	//	else{
		ob_start();
        $from_id = Db::table('detail')->where('id',$id)->column('from_id');
        $first_id = Db::table('second_list')->where('id',$from_id[0])->column('pre_id');
        $name = Db::table('first_list')->where('id',$first_id[0])->column('name');
		$name = $name[0];
        if($id){
            $content = $this->getContent($id);
            $nav = $this->getNav();
            $category = $this->getCategory($id);
			 $this->assign('nav',$nav);
             $this->assign('content',$content);
             $this->assign('category',$category);
             $this->assign('name',$name);

             include('../application/index/view/index/article.html');
             $data = file_put_contents($path, ob_get_contents());  
          //  return view('article',['nav'=>$nav,'content'=>$content,'category'=>$category,'name'=>$name[0]]);
        }else{
            $this->error('系统出错');
        }
	//	}
    }

    public function before(){
        return view('before');
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
       //    if(is_file('./page/index.html') && (time() - filemtime('./page/index.html')) < 3600) { //设置缓存失效时间  
		   
     //      require_once('./page/index.html');  
     //   } else {             
           ob_start();
            $nav = $this->getNav();
            $announcement = $this->getAnnouncement();
            $news = $this->getNews();
            $company = $this->getCompany();
            $link = $this->getLink();
            $active = $this->getActive();
            $active = $active[0];
       //    echo "<pre>";print_r($active);echo "<pre>";die;
             $this->assign('nav',$nav);
             $this->assign('announcement',$announcement);
             $this->assign('news',$news);
             $this->assign('company',$company);
             $this->assign('link',$link);
             $this->assign('active',$active);
          //   include('../application/index/view/index/index.html');
         //    $data = file_put_contents('./page/index.html', ob_get_contents());      
            return view('index',['nav'=>$nav,'active'=>$active,'link'=>$link,'company'=>$company,'news'=>$news,'announcement'=>$announcement]);
     //   }
    }
    }


    public function companyDetail(){
        $id = Request::instance()->param('id');
         $nav = $this->getHeader();
         $second_id = Db::table('second_list')->where('name','所有企业')->field('id')->find();
         $list = Db::table('detail')->where('from_id',$second_id['id'])->field(['id,tittle'])->select(); 
        $detail = Db::table('detail')->where('id',$id)->field(['tittle','content'])->find();
         //var_dump($list);die;
        return view('companyDetail',['nav'=>$nav,'first_name'=>'园区企业','name'=>'所有企业','category'=>$list,'data'=>$detail]);
    }

    public function showDetail($id){
		$path = './page/'.$id.'.html';//require_once($path);  die;
	//	if(is_file($path)){
		//	 require_once($path);  
	//	}
	//	else{
		ob_start();
        $nav = $this->getNav();
		$link = $this->getLink();
        $data = Db::table('detail')->where('id',$id)
                                ->field(['id','from_id','tittle','author','source','media','summary','content','publish_time'])
                                ->select();
        $name = Db::table('second_list')->where('id',$data[0]['from_id'])->column('name');
		$name = $name[0];
        $pre_id = Db::table('second_list')->where('name',$name)->column('pre_id');
        $first_name = Db::table('first_list')->where('id',$pre_id[0])->column('name');
		$first_name=$first_name[0];
		 $this->assign('nav',$nav);
		 $this->assign('name',$name['0']);
		 $this->assign('first_name',$first_name);
		 $this->assign('data',$data);
		 $this->assign('link',$link);
		 include('../application/index/view/index/showDetail.html');
		 file_put_contents($path, ob_get_contents());  		
	//	}
		
		// return view('showDetail',['nav'=>$nav,'link'=>$link,'name'=>$name[0],'first_name'=>$first_name[0],'data'=>$data]);
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

    public function getActive(){
        $data = Db::table('active')->where('status','进行中')->limit(1)
                                    ->order('publish_time','desc')
                                    ->select();
        for($i=0;$i<count($data);$i++){
            $count = strlen($data[$i]['regular']);
            if($count>=381){
                $data[$i]['regular'] = substr($data[$i]['regular'],0,380).'...';
            }

        }
        return $data;
    }

    public function getCompany(){
        $id = Db::table('second_list')->where('name','企业展播')->column('id');
        $data = Db::table('detail')->where('from_id',$id[0])
                            ->where('have_from',1)
                            ->limit(4)
                            ->field(['id,tittle,image'])
                            ->select();

        return $data;
    }

    public function getNews(){
        $data =Db::table('second_list')->where('name','新闻速递')->find();
        $news = Db::table('detail')->where('from_id',$data['id'])
                                ->where('have_from',1)
								->order('publish_time','desc')
                                ->field(['id,tittle,image,publish_time,summary'])
                                ->limit(4)
                                ->select();
							
        return $news;
    }

    public function getAnnouncement(){
         $data =Db::table('second_list')->where('name','通知公告')->find();
        $data = Db::table('detail')->where('from_id',$data['id'])
                                    ->where('have_from',1)
									->order('publish_time','desc')
                                    ->field(['id,tittle,image,publish_time,summary'])
                                    ->limit(4)
                                    ->select();
        return $data;
    }


    public function showCategory(){

        $id = Request::instance()->param('id');
        if($id){   
           if(!is_numeric($id)){
                $res = Db::table('second_list')->where('name',$id)->find();
                if($res['id']){
                    $id = $res['id'];
                }
            }
			 $res = Db::table('second_list')->where('id',$id)->find();
			 if($res['name']=='申请入园'){
				$this->redirect('apply/addApply');
			 }elseif($res['name']=='文件下载'){
				$this->redirect('file/fileDownload');
			 }
      
            $count = $this->countContent($id);
            switch ($count){
                case 0: return $this->returnBlank($id);
                    break;
                case 1: return $this->returnOne($id);
                    break;
                default: return $this->returnList($id);
                    break;
            }
        }else{
            $this->error('系统出错');
        }
    }


    protected function returnList($id){
        $res = Db::table('second_list')->where('id',$id)->field(['name','pre_id'])->find();
        $first_name = Db::table('first_list')->where('id',$res['pre_id'])->column('name');
        $nav = $this->getNav();
		 $link = $this->getLink();
        $category = $this->getCategoryFromSecond($id);
        $contentList = $this->getContentList($id);
        return view('showContentList',['nav'=>$nav,'link'=>$link,'contentList'=>$contentList,'category'=>$category,'name'=>$res['name'],'first_name'=>$first_name[0]]);
    }

    protected function getContentList($id){
        $contentList = Db::table('detail')->where('from_id',$id)
                                            ->order('order_id','asc')
											->order('publish_time','desc')
                                            ->field(['id','tittle','publish_time'])
                                            ->select();
        return $contentList;
    }

    protected function returnOne($id){
        $name = Db::table('second_list')->where('id',$id)->column('name');
        $content = $this->getContentBySecond($id);
        $nav = $this->getNav();
        $category = $this->getCategoryFromSecond($id);
        return view('showCategory',['nav'=>$nav,'content'=>$content,'category'=>$category,'name'=>$name[0]]);
    }

    protected function getContentBySecond($id){
        $content = Db::table('detail')->where('from_id',$id)->select();
        return $content;
    }

    public function returnBlank($id){
        $name = Db::table('second_list')->where('id',$id)->column('name');
        $content[0]['content'] = "";
        $content[0]['publish_time'] = "";
        $content[0]['author'] = "";
        $content[0]['source'] = "";
        $content[0]['type'] = "";
        $content[0]['tittle'] = "";
        $nav = $this->getNav();
        $category = $this->getCategoryFromSecond($id);//var_dump($category);die;
        return view('showCategory',['nav'=>$nav,'content'=>$content,'category'=>$category,'name'=>$name[0]]);
    }

    protected function getCategoryFromSecond($id){
        $pre_id = Db::table('second_list')->where('id',$id)->find();
        $category = Db::table('second_list')->where('pre_id',$pre_id['pre_id'])->select();
        return $category;
    }



    public function countContent($id){
        $query  = Db::table('detail')->where('from_id',$id)->select();
        $count = count($query);
        return $count;
    }

    protected function getContent($id){
        $data = Db::table('detail')->where('id',$id)
                            ->field(['tittle','author','type','publish_time','summary','source','content'])
                            ->order('order_id','asc')
                            ->select();
        return $data;
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



    public function getCategory($id){
        $detail_id = Db::table('detail')->where('id',$id)->field('from_id')->find();
        $pre_id = Db::table('second_list')->where('id',$detail_id['from_id'])
                                            ->field(['pre_id'])
                                            ->find();
        $category = Db::table('second_list')->where('pre_id',$pre_id['pre_id'])->field(['id','name'])->select();
        return $category;
    }

    public function getLeftBlock(){
        $data = Db::table('content_public')->field(['block','second_list_id','second_list_name'])
                                            ->order('block','asc')
                                            ->select();

        $arr =[];
        foreach ($data as $key=>$value){
            $arr[$value['second_list_name']] = Db::table('detail')->where('from_id',$data[$key]['second_list_id'])
                                             ->field(['id','tittle','publish_time'])
                                            ->order('order_id','asc')
                                            ->select();
        }
        return $arr;
    }
}
