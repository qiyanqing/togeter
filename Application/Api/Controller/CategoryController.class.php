<?php
namespace Api\Controller;
use Think\Controller;
class CategoryController extends Controller {
    public function cate(){
    	$result = array();
    	$category = M('category')->where(array('status'=>1,'parent_id'=>0))->select();
    	foreach ($category as $value) {
            $data[] = array('name'=>$value['name'],'icon'=>'fa-'.$value['icon'],'id'=>$value['id']);
    	}
        $result['data']=$data;
    	$result['status'] = 'success';
    	//var_dump($result);
    	$this->ajaxReturn($result);
    }
    public function cate_child(){
        $result = array();
        $result['status'] = 'success';
        $id = isset($_POST['id'])?$_POST['id']:1;
        $cate_one = M('category')->where(array('status'=>1,'id'=>$id))->field('name')->find();
        $result['data'] = array('father'=>$cate_one['name']);
        foreach ($cate_one as $key => $value) {
            $child =  M('category')->where(array('status'=>1,'parent_id'=>$id))->field('id,name,icon')->select();
            foreach ($child as $k => $v) {
                $son_s = M('category')->where(array('status'=>1,'parent_id'=>$v['id']))->field('name,id')->select();
                $child[$k]['son_s'] = $son_s;
            }
        }
        // $cate_one['child'] = $child;
        $result['data']['child'] = $child;
        //r_dump($result);
        $this->ajaxReturn($result);
    }
    
}    


















//     public function cate_child(){
//         header("Access-Control-Allow-Origin: *");
//         $result = array();
//         $result['status'] = 'success';
//         $id = isset($_POST['id'])?$_POST['id']:1;
//         $cate_one = M('category')->where(array('status'=>1,'id'=>$id))->field('name')->select();
//         $result['data']['one'] = $cate_one;
//         $cate_two = M('category')->where(array('status'=>1,'parent_id'=>$id))->field('id,name,icon,status')->select();
//         foreach ($cate_two as $key => $value) {
//             $result['data']['two'][] = array('name'=>$value['name'],'icon'=>$value['icon']);
//         }
//         var_dump($result);
//     }

// }