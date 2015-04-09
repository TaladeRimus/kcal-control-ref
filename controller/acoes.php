<?php
	

if(isset($_POST["cadastrar"])){

include "../Model/Usuario.class.php";
include "../PDO/UsuariosPDO.class.php";

	$nome = $_POST["nome"];
	$email = $_POST["email"];
	$sexo = $_POST["sexo"];
	$senha = $_POST["senha"];
	$altura = $_POST["altura"];
	$peso = $_POST["peso"];
	$idade = $_POST["idade"];
	$objetivo = $_POST["objetivo"];

	$usuario =  new Usuario(1, $nome, $email, $sexo, $senha, $altura, $peso, $idade, $objetivo);
	//var_dump($usuario);

	$acoes = new UsuariosPDO();
	$acoes->inserirUsuario($usuario);

}
?>