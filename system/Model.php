<?php 

class Model{
	public $host="localhost";
	public $username="root";
	private $password="";
	public $dbname="image";
	public $conn;
	public $nSelect;
	public function GetPass(){
		return $this->password;
	}
	public function __construct(){
			$this->conn=mysqli_connect($this->host,$this->username,$this->GetPass(),$this->dbname);
			if ($this->conn) {
				// echo "success";
			}
			else{
				echo "db error";
			}
		
	}
	public function NewsSelect($strr){
		$this->nSelect = mysqli_query($this->conn,"SELECT * FROM ".$strr."");
	
	}

	public $Insert;
	public function Insert($filename){
		$type = ["image/png","image/jpg","image/bmp","image/jpeg","image/psd"];
		
		for ($i=0; $i <count($filename["name"]) ; $i++) { 

			if (in_array($filename["type"][$i], $type)) {
				$rand = rand(99999,1000000);
				$mode  = end(explode(".", $filename["name"][$i]));
				$fileName ='uploads/'.$rand.".".$mode;
				$size = $filename["size"][$i]/1024;
				if ($size<=1024*3) {
					
							if (move_uploaded_file($filename["tmp_name"][$i],$fileName)) {
								echo "yazildi";
							}

				}
				else{
					echo "faylin yaddasi coxdur!";
				}
			}
			else{
				echo "sekil demisik sene!";
			}
		
		
	}
return $this->Insert;
	}

}

?>