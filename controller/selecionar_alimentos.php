<?php 
include '../PDO/AlimentosPDO.class.php';
// Verifica se existe a variável txtnome 
if (isset($_GET["txtnome"])) { $nome = $_GET["txtnome"]? $_GET['txtnome'] : '';
	// Conexao com o banco de dados 
	
	$alimento = new AlimentosPDO();
	$alimento->selecionarAlimento($nome);
	
}
?>
