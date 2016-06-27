<?php

class BancoPDO {

	public $type = "mysql";
	public $host = "localhost";
	public $user = "root";
	public $pass = "";
	public $bd = "kcal";


	public $con = null;
	public function conectar(){

		try {
			$this->con = new PDO($this->type.
								 ":host=".$this->host.
								 ";dbname=".$this->bd,
								 $this->user,$this->pass);

			return $this->con;

			
		} catch (Exception $e) {
			echo "Database Error: " . $e->getMessage();
		}

	}

}



?>