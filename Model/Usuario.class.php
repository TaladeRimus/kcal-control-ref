<?php

class Usuario{

	private $id;
	private $nome;
	private $email;
	private $sexo;
	private $senha;
	private $altura;
	private $peso;
	private $idade;
	private $objetivo;

	function __construct($id, $nome, $email, $sexo, $senha, $altura, $peso, $idade, $objetivo){

		$this->id = $id;
		$this->nome = $nome;
		$this->email = $email;
		$this->sexo = $sexo;
		$this->senha = $senha;
		$this->altura = $altura;
		$this->peso = $peso;
		$this->idade = $idade;
		$this->objetivo = $objetivo;

	}

	function __set($prop, $val){
		$this->$prop = $val;
	}

	function __get($prop){
		return $this->$prop;
	}

	function toArray(){

		return array(':nome'=>$this->nome,
					 ':email'=>$this->email, 
					 ':sexo'=>$this->sexo, 
					 ':senha'=>$this->senha, 
					 ':altura'=>$this->altura, 
					 ':peso'=>$this->peso, 
					 ':idade'=>$this->idade, 
					 ':objetivo'=>$this->objetivo);


	}
}