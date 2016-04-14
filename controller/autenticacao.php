<?php

	if(isset($_POST)) {

		include "../model/Usuario.class.php";
		include "../PDO/UsuariosPDO.class.php";


		$email = $_POST["email"];
		$senha = $_POST["senha"];

		$usuario = new Usuario("", "", $email, "", md5($senha), "", "","", "");

		$pdo = new UsuariosPDO();
		
		$return = $pdo->autenticar($email, md5($senha));
		
		if($return == null){
			header("Location: ../index.php");
		} else {

			session_start();
			$_SESSION["id"] = session_id();
			$_SESSION["idusuario"] = $return->id;
		}
	}