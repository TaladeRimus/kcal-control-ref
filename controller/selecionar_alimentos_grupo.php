<?php 
include '../PDO/AlimentosPDO.class.php';
// Verifica se existe a variável txtnome 
if (isset($_GET["tablebd"])) { $tabela = $_GET["tablebd"]? $_GET['tablebd'] : '';
	// Conexao com o banco de dados 
	
	$alimento = new AlimentosPDO();
	$alimentosDieta = $alimento->selecionaAlimentosDieta($tabela);
}
?>