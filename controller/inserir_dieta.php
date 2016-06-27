<?php
include '../PDO/AlimentosPDO.class.php';
	
	$nomeDieta = $_POST['nomeDieta'];
    $nomePaciente = $_POST['nomePaciente'];
    
	$desjejum_leite = $_POST['desjejum_leite'];
	$desjejum_pao = $_POST['desjejum_pao'];
	$desjejum_gordura = $_POST['desjejum_gordura'];
	$desjejum_frios = $_POST['desjejum_frios'];

	 if (isset($_POST['nomeDieta'])) {

	 		$dieta = new AlimentosPDO();
			$dieta->inserirDieta($nomeDieta, $nomePaciente, $desjejum_leite, $desjejum_pao, $desjejum_gordura, $desjejum_frios);

			var_dump($dieta);
			die();

			echo "Dieta cadastrada com sucesso !";
			
	}else{
			echo "Insira o Nome da refeição";
		}
 ?>