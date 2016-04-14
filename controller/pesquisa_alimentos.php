<?php
include '../PDO/AlimentosPDO.class.php';
	
	$nome = $_POST['nome'];
    $vetor =  json_decode($_POST['alimentos']);
	$id_usuario = $_POST['id'];

	 if (isset($_POST['nome'])) {

	 		$refeicao = new AlimentosPDO();
			$ultimoIdInserido = $refeicao->incluirRefeicao($nome, $id_usuario);
			foreach ($vetor as $v) { 
				$refeicao->incluirRefeicaoAlimento($ultimoIdInserido, $v->id ,$v->qtd);
			}
			
			echo "Refeição cadastrada com sucesso !";
			
	}else{
			echo "Insira o Nome da refeição";
		}
 ?>