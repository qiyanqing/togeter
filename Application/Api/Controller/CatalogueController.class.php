<?php
namespace Api\Controller;
use Think\Controller;
class CatalogueController extends Controller {
     public function catalo(){
        $result = array();
        $result['status'] = 'success';
        $id = isset($_POST['id'])?$_POST['id']:18;
        $title = M('category')->where(array('status'=>1,'id'=>$id))->field('name')->find(); 
        $advert = M('advert')->where(array('status'=>1))->field('img,address')->select();
        $sub_all = subAll($id);
        $sub_off = subOff($id);
        $section = $sub_off.'/'.$sub_all;
        $exam_all = examAll($id);
        $exam_off = examOff($id);
        $exam = $exam_off.'/'.$exam_all;
        $test_all = testAll($id);
        $test_off = testOff($id);
        $test = $test_off.'/'.$test_all;
        $result['data'] = array('name'=>$title['name'],'advert'=>$advert);
        $result['data']['num'][] = $section;
        $result['data']['num'][] = $exam;
        $result['data']['num'][] = $test;
        //var_dump($result);
        $this->ajaxReturn($result);
     }
    public function subject(){
    	$result = array();
        $result['status'] = 'success';
        $id = isset($_POST['id'])?$_POST['id']:'18';
        $type = isset($_POST['type'])?$_POST['type']:'章节练习';
        $title = M('category')->where(array('status'=>1,'id'=>$id))->field('name')->find();
        $subject = M('catalogue')->where(array('course_id'=>$id,'type'=>$type))->field('name,id')->select();
        foreach ($subject as $key => $value) {
        	$sub_name['name'][] = $value['name'];
        }
        $result['data']['title'] = $title;
        $result['data']['subject'] = $sub_name;
        //var_dump($result);
        $this->ajaxReturn($result);
    }
}