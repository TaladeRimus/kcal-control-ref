<?php

	if(isset($_POST)) {

		include "../model/Usuario.class.php";
		include "../PDO/UsuariosPDO.class.php";


		$email = $_POST["email"];
		$senha = $_POST["senha"];

		$usuario = new Usuario("", "", $email, "", $senha, "", "","", "");

		$pdo = new UsuariosPDO();

		if(($return = $pdo->autenticar($usuario)) == null){
			header("Location: ../index.php");
		} else {
			session_start();
			$_SESSION["id"] = session_id();
			$_SESSION["idusuario"] = $return["id"];
		}
	}