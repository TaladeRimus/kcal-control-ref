<?php 

include '../PDO/AlimentosPDO.class.php';

	if (isset($_GET["txtidRefeicao"])) { 
		$idRefeicao = $_GET["txtidRefeicao"]? $_GET['txtidRefeicao'] : '';
		
		$refeicao = new AlimentosPDO();
		$refeicao->selecionarListaRefeicao($idRefeicao);


	}
?>