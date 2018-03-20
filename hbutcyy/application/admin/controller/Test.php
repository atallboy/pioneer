<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2018/1/2
 * Time: 18:46
 */

namespace app\admin\controller;


use think\Controller;
use think\Db;
use think\Request;
use PHP_XLSXWriter\XLSXWriter;
use excel\PHPExcel;
use excel\PHPExcel\Writer;
use excel\PHPExcel\PHPExcel_Calculation;


class Test extends Controller
{
    public function exportExcel1(){
        $filename = "example.xlsx";
        header('Content-disposition: attachment; filename="'.XLSXWriter::sanitize_filename($filename).'"');
        header("Content-Type: application/vnd.openxmlformats-officedocument.spreadsheetml.sheet");
        header('Content-Transfer-Encoding: binary');
        header('Cache-Control: must-revalidate');
        header('Pragma: public');

        $rows = array(
            array('2003','1','-50.5','2010-01-01 23:00:00','2012-12-31 23:00:00'),
            array('2003','=B2', '23.5','2010-01-01 00:00:00','2012-12-31 00:00:00'),
        );
        $writer = new XLSXWriter();
        $writer->setAuthor('Some Author');
        foreach($rows as $row)
            $writer->writeSheetRow('Sheet1', $row);
            $writer->writeToStdOut();
//$writer->writeToFile('example.xlsx');
//echo $writer->writeToString();
        exit(0);

    }




    public function test2()
    {

        return view('test4');
    }

    public function test3()
    {

        $imgname = $_FILES['file']['name'];
        $tmp = $_FILES['file']['tmp_name'];
        $filepath = './';
        if (move_uploaded_file($tmp, $filepath.$imgname )) {
            echo "上传成功";
        } else {
            echo "上传失败";

        }
    }

    public function test4(){
        $data = Request::instance()->param('name');
        if($data){
           $res = setcookie("name1",$data,time()+2*7*24*3600,'/');
            if($res){
                return view('test4');
            }
        }
        return view('test3');

    }

    public function test5(){
        $name=$_COOKIE;
        var_dump($name);
    }

    function exportExcel(){
        //文件引入

        require '/excel/PHPExcel.php';
        require '/excel/PHPExcel/Writer/Excel2007.php';
        require '/excel/PHPExcel/Calculation.php';

        $indexKey = array('id','username','sex','age');
        $list = array(array('id'=>1,'username'=>'YQJ','sex'=>'男','age'=>24));
        $name='haha';$startRow=1;$excel2007=false;

        if(empty($filename)) $filename = time();
        if( !is_array($indexKey)) return false;

        $header_arr = array('A','B','C','D','E','F','G','H','I','J','K','L','M', 'N','O','P','Q','R','S','T','U','V','W','X','Y','Z');
        //初始化PHPExcel()
        $objPHPExcel = new PHPExcel();

        //设置保存版本格式
        if($excel2007){
            $objWriter = new PHPExcel_Writer_Excel2007($objPHPExcel);
            $filename = $filename.'.xlsx';
        }else{
            $objWriter = new PHPExcel_Writer_Excel5($objPHPExcel);
            $filename = $filename.'.xls';
        }

        //接下来就是写数据到表格里面去
        $objActSheet = $objPHPExcel->getActiveSheet();
        //$startRow = 1;
        foreach ($list as $row) {
            foreach ($indexKey as $key => $value){
                //这里是设置单元格的内容
                $objActSheet->setCellValue($header_arr[$key].$startRow,$row[$value]);
            }
            $startRow++;
        }

        // 下载这个表格，在浏览器输出
        header("Pragma: public");
        header("Expires: 0");
        header("Cache-Control:must-revalidate, post-check=0, pre-check=0");
        header("Content-Type:application/force-download");
        header("Content-Type:application/vnd.ms-execl");
        header("Content-Type:application/octet-stream");
        header("Content-Type:application/download");;
        header('Content-Disposition:attachment;filename='.$filename.'');
        header("Content-Transfer-Encoding:binary");
        $objWriter->save('php://output');
    }

    public function test6(){
        $indexKey = array('id','username','sex','age');
        $list = array(array('id'=>1,'username'=>'YQJ','sex'=>'男','age'=>24));
        $name='haha';
        $this->exportExcel($list,$name,$indexKey);
    }

}