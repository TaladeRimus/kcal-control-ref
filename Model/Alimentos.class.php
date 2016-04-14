<?php

class Alimentos{

	private $id;
	private $nome;
	private $peso;
	private $porcao;
	private $calorias;

	function __construct($id, $nome, $peso, $porcao, $calorias){

		$this->id = $id;
		$this->nome = $nome;
		$this->peso = $peso;
		$this->porcao = $porcao;
		$this->calorias = $calorias;
		
	}

	function __set($prop, $val){
		$this->$prop = $val;
	}

	function __get($prop){
		return $this->$prop;
	}

	function toArray(){

		return array(':nome'=>$this->nome,
					 ':peso'=>$this->email, 
					 ':porcao'=>$this->sexo, 
					 ':calorias'=>$this->calorias
					 );


	}
}