<?php if (!defined('THINK_PATH')) exit(); /*a:3:{s:68:"D:\www\hbutcyy\public/../application/admin\view\detail\editList.html";i:1515633599;s:66:"D:\www\hbutcyy\public/../application/admin\view\public\header.html";i:1520218805;s:66:"D:\www\hbutcyy\public/../application/admin\view\public\footer.html";i:1520218823;}*/ ?>
<!DOCTYPE HTML>
<html>
<head>
    <meta charset="utf-8">
    <meta name="renderer" content="webkit|ie-comp|ie-stand">
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
    <meta name="viewport" content="width=device-width,initial-scale=1,minimum-scale=1.0,maximum-scale=1.0,user-scalable=no" />
    <meta http-equiv="Cache-Control" content="no-siteapp" />


    <link rel="Bookmark" href="/static//favicon.ico" >
    <link rel="Shortcut Icon" href="/static//favicon.ico" />



    <!--[if lt IE 9]>
    <script type="text/javascript" src="/static/lib/html5shiv.js"></script>
    <script type="text/javascript" src="/static/lib/respond.min.js"></script>
    <![endif]-->
    <link rel="stylesheet" type="text/css" href="/static/static/h-ui/css/H-ui.min.css" />
    <link rel="stylesheet" type="text/css" href="/static/static/h-ui.admin/css/H-ui.admin.css" />



    <link rel="stylesheet" type="text/css" href="/static/lib/Hui-iconfont/1.0.8/iconfont.css" />
    <link rel="stylesheet" type="text/css" href="/static/static/h-ui.admin/skin/default/skin.css" id="skin" />    
    <link rel="stylesheet" type="text/css" href="/static/static/h-ui.admin/css/style.css" />


    <!--[if IE 6]>
    <script type="text/javascript" src="/static/lib/DD_belatedPNG_0.0.8a-min.js" ></script>
    <script>DD_belatedPNG.fix('*');</script>
    <![endif]-->
    <title>湖北工业大学双创基地</title>

</head>
<body>
<nav class="breadcrumb"><i class="Hui-iconfont">&#xe67f;</i> 首页 <span class="c-gray en">&gt;</span> 内容 <span class="c-gray en">&gt;</span> 查看内容 <a class="btn btn-success radius r" style="line-height:1.6em;margin-top:3px" href="javascript:location.replace(location.href);" title="刷新" ><i class="Hui-iconfont">&#xe68f;</i></a></nav>
<div class="pd-20">
  <!--
  <div class="text-c"> 日期范围：

  </div>
  -->
  <div class="cl pd-5 bg-1 bk-gray mt-20">
    <span class="l"><a href="/admin/index/addList" onclick="datadel()" class="btn btn-danger radius"><i class="icon-trash"></i> 批量删除</a>
    <a href="javascript:;" onclick="user_add('550','','添加内容','user-add.html')" class="btn btn-primary radius"><i class="icon-plus"></i> 添加内容</a></span>
    <span class="r">共有数据：<strong><?php echo $total; ?></strong> 条</span>
  </div>
  <table class="table table-border table-bordered table-hover table-bg table-sort">
    <thead>
    <tr class="text-c">
      <th width="40">ID</th>
      <th width="170">标题</th>
      <th width="80">作者</th>
      <th width="35">类型</th>
      <th width="150">来源</th>
      <th width="">所属栏目</th>
      <th width="150">发布时间</th>
      <th width="150">创建时间</th>
      <th width="40">状态</th>
      <th width="100">操作</th>
    </tr>
    </thead>
    <tbody>
    <?php foreach ($data as $values){
    echo
      '<tr class="text-c">
    <td>'.$values['id'].'</td>
    <td>'.$values['tittle'].'</td>
    <td>'.$values['author'].'</td>
    <td>'.$values['type'].'</td>
    <td>'.$values['source'].'</td>
    <td>'.$values['from_id'].'</td>
    <td>'.$values['publish_time'].'</td>
    <td>'.$values['update_time'].'</td>
    <td class="user-status"><span class="label label-success">'.$values['have_from'].'</span></td>
    <td class="td-manage"><a href="editList?id='.$values['id'].'">修改</a>&nbsp;&nbsp;
                           <a href="deleteDetail?id='.$values['id'].'">删除</a></td>
    </tr>';
    }
    ?>
    </tbody>
  </table>
  <div id="pageNav" class="pageNav"></div>
</div>
<!--_footer 作为公共模版分离出去-->
<script type="text/javascript" src="/static/lib/jquery/1.9.1/jquery.min.js"></script>
<script type="text/javascript" src="/static/lib/layer/2.4/layer.js"></script>
<script type="text/javascript" src="/static/static/h-ui/js/H-ui.min.js"></script>
<script type="text/javascript" src="/static/static/h-ui.admin/js/H-ui.admin.js"></script> <!--/_footer 作为公共模版分离出去-->

<!--请在下方写此页面业务相关的脚本-->
<script type="text/javascript" src="/static/lib/jquery.contextmenu/jquery.contextmenu.r2.js"></script>

<!--请在下方写此页面业务相关的脚本-->
<script type="text/javascript" src="lib/My97DatePicker/4.8/WdatePicker.js"></script>
<script type="text/javascript" src="lib/datatables/1.10.0/jquery.dataTables.min.js"></script>
<script type="text/javascript" src="lib/laypage/1.2/laypage.js"></script>
<script type="text/javascript">
  window.onload = (function(){
    // optional set
    pageNav.pre="&lt;上一页";
    pageNav.next="下一页&gt;";
    // p,当前页码,pn,总页面
    pageNav.fn = function(p,pn){$("#pageinfo").text("当前页:"+p+" 总页: "+pn);};
    //重写分页状态,跳到第三页,总页33页
    pageNav.go(1,13);
  });
  $('.table-sort').dataTable({
    "lengthMenu":false,//显示数量选择
    "bFilter": false,//过滤功能
    "bPaginate": false,//翻页信息
    "bInfo": false,//数量信息
    "aaSorting": [[ 1, "desc" ]],//默认第几个排序
    "bStateSave": true,//状态保存
    "aoColumnDefs": [
      //{"bVisible": false, "aTargets": [ 3 ]} //控制列的隐藏显示
      {"orderable":false,"aTargets":[0,8,9]}// 制定列不参与排序
    ]
  });
</script>
</body>
</html>
