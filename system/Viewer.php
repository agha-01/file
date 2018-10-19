<?php 

class Viewer{
	public function __construct(){

	}
	public function view($str,$param=null){
		$fileName='view/'.$str.'.php';
		if (file_exists($fileName)) {
			include 'view/header.php';
			include $fileName;
			include 'view/footer.php';
			return true;
		}
		else{
			echo "Bele seyfe yoxdur";
			return false;
		}
	}
}











 ?>