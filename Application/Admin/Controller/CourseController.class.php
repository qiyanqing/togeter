<?php
namespace Admin\Controller;
use Think\Controller;
class CourseController extends Controller {
	public function index(){
		$list = M('course')->select();
		$this->assign('list',$list);
		$this->display();
	}
	public function add(){
		$category_c = M('category')->select();
		getTree($category_c,0,$result);
		$this->assign('category_c',$result);
		$this->display();
	}
	public function handleadd(){
		$data = array();
		$info = upload('img','course');
		if($info['status']=='error'){
			$this->error('上传失败！');
		}else{
			$data['img'] = $info['path'];
		}
		$data['name'] = $_POST['name'];
		$data['category_id'] =$_POST['parent'];
		$data['status'] = 1;
		$data['create_time'] = date('Y-m-d H:i:s');
		$c = M('course')->add($data);
		if ($c > 0) {
			$this->success('ok',U('admin/course/add'));
		}else{
			$this->error('no',U('admin/course/add'));
		}
	}
	public function edit(){
		$course = M('course')->select();
		$this ->assign('course',$course);
		$i = $_GET['id'];
		$c_info = M('course')->where(array('id'=>$i))->find();
		$this->assign('a',$c_info);
		$this->display();
	}
	public function handleedit(){
		$data = array();
		$info = upload('img','course');
		if($info['status']=='error'){
			$this->error('上传失败！');
		}else{
			$data['img'] = $info['path'];
		}
		$i = $_POST['id'];
		$data['name'] = $_POST['name'];
		$data['user_done_num'] = $_POST['user_done_num'];
		$data['update_time'] = date('Y-m-d H:i:s');
		$data['status'] = $_POST['status'];
		$c = M('course')->where(array('id'=>$i))->save($data);
		// var_dump($c);
		// var_dump($data);
		if ($c > 0) {
			$this->success('ok',U('admin/course/index'));
		}else{
			$this->error('no',U('admin/course/index'));
		}	
	}
	public function delete(){
		$i = $_GET['id'];
		$c = M('course')->where(array('id'=>$i))->delete();
		if ($c > 0) {
			$this->success('ok',U('admin/course/index'));
		}else{
			$this->error('no',U('admin/course/index'));
		}
		
	}
}