<?php

include "BancoPDO.class.php";

class Exercicios extends BancoPDO {

	public function __construct(){

		$this->con = BancoPDO::conectart();

	}



}

?>