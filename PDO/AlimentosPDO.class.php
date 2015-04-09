<?php

include "BancoPDO.class.php"

class AlimentosPDO extends BancoPDO {

	public function __construct(){
		$this->con = BancoPDO::conectar();
	}




}



?>