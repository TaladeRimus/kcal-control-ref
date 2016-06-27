<?php 
require "../controller/validation.php";
include '../PDO/AlimentosPDO.class.php';

	if (isset($_GET["txtdata"])) { 
		$data = $_GET["txtdata"]? $_GET['txtdata'] : '';
		$id_usuario = $_SESSION['idusuario'];

		$refeicao = new AlimentosPDO();

		$refeicao->selecionarDieta($data, $id_usuario);

	}
?>