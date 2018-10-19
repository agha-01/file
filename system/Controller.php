<?php 
class Controller{
	public static $view;
	public static $db;
	public function __construct(){
		self::$view = new Viewer();
		self::$db = new Model();
	}
}


?>