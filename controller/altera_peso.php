<?php 
		require "validation.php";
		include "../PDO/UsuariosPDO.class.php";
		
		$peso = $_POST['peso'];
		$idUser = $_SESSION["idusuario"];
		$bd = new UsuariosPDO();
		
		$bd->alterarPesoUsuario($idUser, $peso);
		
		
 ?>