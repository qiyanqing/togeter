<?php
namespace Api\Controller;
use Think\Controller;
class CourseController extends Controller {
    public function cour(){
        header("Access-Control-Allow-Origin: *");
    	$result = array();
        $cate_id = isset($GET['category_id'])?$_GET['category']:1;
    	$courses = M('course')->where(array('status'=>1,'category_id'=>$cate_id))->select();
    	foreach ($courses as $value) {
            $img = 'http://toget.cn/Public/upload/'.$value['img'];
            $data[] = array('id'=>$value['id'],'name'=>$value['name'],'img'=>$img,'user_done_num'=>$value['user_done_num']);
    	}
        $result['data']=$data;
    	$result['status'] = 'success';
    	$this->ajaxReturn($result);
    }
}