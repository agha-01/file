<?php 
class pageController extends Controller{
	public function __construct(){
		parent::__construct();
	}
	public function home($str = null){
		Controller::$view->view('home',$str);
	}
	public function add(){
		Controller::$view->view('add');
	}
	
	public function existsMethod($str){
		if (method_exists($this, $str)) {
			return true;
		}
		else{
			return false;
		}
	}
}


?>