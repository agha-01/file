<?php 
class Functions{
	public static $url;
	public function __construct(){

	}
	public function start(){
		if (isset($_GET[self::$url])) {
			// echo $_GET[self::$url];
			$urlName = explode('/',$_GET[self::$url]);

			if ($this->existsController($urlName[0])) {
				$urlName[0].='Controller';
				//echo $urlName[0];
				$pageController = new $urlName[0]();
				if ($pageController->existsMethod($urlName[1])) {
					if (isset($urlName[2])) {
						$pageController->$urlName[1]($urlName[2]);
					}
					else{
						$pageController->$urlName[1]();
					}
				}
				else{
					echo "bele bir sehife yoxdur";
				}	
			}
			else{
				$fileName = 'Controllers/pageController.php';
				include $fileName;
				$pController = new pageController();
				if ($pController->existsMethod($urlName[0])) {
					if (isset($urlName[1])) {
						$pController->$urlName[0]($urlName[1]);
					}
					else{
						$pController->$urlName[0]();
					}
				}
				else{
					echo "bele bir sehife yoxdur";
				}
				
			}
		}
		else{
			$fileName = 'Controllers/pageController.php';
			include $fileName;
			$pController = new pageController();
			$pController->home();
		}
	}
	public function existsController($contName){
		$fileWay = 'Controllers/'.$contName.'Controller.php';
		if (file_exists($fileWay)) {
			include $fileWay;
			return true;
		}
		else{
			return false;
		}
	}
}

?>