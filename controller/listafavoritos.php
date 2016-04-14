<?php 
require "../controller/validation.php";
include '../PDO/AlimentosPDO.class.php';

		$id_usuario = $_SESSION['idusuario'];
		
		$favorito = new AlimentosPDO();
		$favorito->listaFavoritos($id_usuario);


	
?>