<?php

include "BancoPDO.class.php";

class AlimentosPDO extends BancoPDO {

	public function __construct(){
		$this->con = BancoPDO::conectar();
	}

	function selecionarAlimento($nome){

				// Verifica se a variável está vazia 
				if (empty($nome)) { 
					$stm = $this->con->prepare("SELECT * FROM alimentos"); 
					} 
				else { 
					$nome .= "%"; 
					$stm = $this->con->prepare("SELECT * FROM alimentos WHERE nome like '$nome'"); 
					} 
				sleep(1); 
				$stm->execute();

				// Verifica se a consulta retornou linhas 
				if ($stm->rowCount() > 0) { 
				
				// Atribui o código HTML para montar uma tabela 
				$tabela = "<ul>
							"; 
				$return = "$tabela"; 
				
				// Captura os dados da consulta e inseri na tabela HTML 
				  while ($linha = $stm->fetch(PDO::FETCH_OBJ)) { 

				  $return.= "<li onclick=getLinha(". $linha->id ."); class=" . $linha->id . ">";
				  $return.= "<span id=nome-alimento >" . utf8_encode($linha->nome) . "</span>"; 
				  $return.= "<div><strong>Peso:</strong><span id=peso>" . utf8_encode($linha->peso) . "g</span></div>"; 
				  $return.= "<div id=porcao><strong></strong><span>" . utf8_encode($linha->porcao) . "</span></div>";
				  $return.= "<div id=qtd><strong>Qtd:</strong><span id=quantidade class=qtd>1</span></div>"; 
				  $return.= "<div><strong>Kcal:</strong><span id=calorias class=calorias>" . utf8_encode($linha->calorias) . "			</span></div>"; 
				  $return.= "<p class=hover_add>Adicionar</p>"; 
				  $return.= "</li>"; } 
				  echo $return.="</ul>"; } 
				  else { 
				  
				// Se a consulta não retornar nenhum valor, exibi mensagem para o usuário 
				echo "Não foram encontrados registros!"; }
	}

	function selecionaAlimentosDieta($tabela){


		$stm = $this->con->prepare("SELECT * FROM ". $tabela);
		$stm->execute();

		if ($stm->rowCount() == 0){
			"Não foi possível encontrar alimentos no grupo";
		}

		else {
			$tabela = "<ul>
			"; 
			$return = "$tabela"; 
			while ($linha = $stm->fetch(PDO::FETCH_OBJ)) { 

				$return.= "<li onclick=getLinha(". $linha->id ."); class=" . $linha->id . ">";
				$return.= "<span id=nome-alimento >" . utf8_encode($linha->nome) . "</span>"; 
				$return.= "<div><strong>Kcal:</strong><span id=calorias class=calorias>" . utf8_encode($linha->kcal) . "			</span></div>"; 
				$return.= "<p class=hover_add>Adicionar</p>"; 
				$return.= "</li>"; 
			}
		
			echo $return.="</ul>"; 
		} 
	
	}
	

	function incluirRefeicao($nome, $id_usuario){
	 	$hoje = date("Y-m-d");

		$stm = $this->con->prepare("INSERT INTO refeicao (nome, data, usuario_id) VALUES ('$nome', '$hoje', '$id_usuario')");
		$stm->execute();
		//mysqli_query($this->conexao, $inserir) or die ("Não foi possível inserir a Refeição");
			
			
		if ( $stm->rowCount() == 0 ) {
			"Não foi possível inserir a refeição";
		}

		else {
			$ultimoIdRefeicao = $this->con->lastInsertId();
			return $ultimoIdRefeicao;
		}
	}

	function incluirRefeicaoAlimento($ultimoIdInserido, $idAlimento, $quantidade){
		
		$stm = $this->con->prepare("INSERT INTO refeicao_alimento (refeicao_id ,alimentos_id, quantidade) VALUES ('$ultimoIdInserido', '$idAlimento', '$quantidade')");

		//$resultado = mysqli_query($this->conexao, $inserir) or die ("Não foi possível inserir a Refeição");
		$stm->execute();

		if($stm->rowCount() == 0 ) {

			//echo "Não foi possível inserir o alimento na refeição";
		}
	}	


	function selecionarDieta($idUsuario){

		$stm = $this->con->prepare("SELECT * FROM dieta WHERE usuario_id = '$idUsuario'"); 

		//sleep(1); 

		$stm->execute();

		if($stm->rowCount() == 0){

			return null;
		}

		else {
			
			/*while($row = $stm->fetch(PDO::FETCH_OBJ)) {*/

			$dados = $stm->fetch(PDO::FETCH_OBJ);


			return $dados;
				/*
					$return = "<div id='porcoes_dieta'>";
					$return.=	"<div><strong>Desjejum:</strong></div>";
					$return.=	"<div><strong>Grupo do leite: </strong><span>" . utf8_encode($row->desjejum_leite) . "</span> porções.</div>";
					$return.=	"<div><strong>Grupo do pão: </strong><span>" . utf8_encode($row->desjejum_pao) . "</span> porções.</div>";
					$return.=	"<div><strong>Grupo da gordura: </strong><span>" . utf8_encode($row->desjejum_gordura) . "</span> porções.</div>";
					$return.=	"<div><strong>Frios Light: </strong><span>" . utf8_encode($row->desjejum_frios) . "</span> porções.</div>";
					$return.=   "<label>Café <strong>OU</strong> chá: à gosto.</label>
								 </br>
								 <label>Adoçante sucralose: 3-4 gotas.</label>
								 </div>";
					}
					   
					echo $return;*/

		
	
		}	
	}


	function selecionarRefeicao($data, $idUsuario){

		if (empty($data)) { 
				$stm = $this->con->prepare("SELECT * FROM refeicao WHERE usuario_id = '$idUsuario'"); 
				} 
			else { 
				$data .= "%"; 
				$stm = $this->con->prepare("SELECT * FROM refeicao WHERE data like '$data'"); 
				} 
			sleep(1); 
			$stm->execute();

			if($stm->rowCount() == 0){

				return null;
			}

			else {
				
				while ($row = $stm->fetch(PDO::FETCH_OBJ)) {


					// Escreve o valor da coluna FirstName (que está no array $row)
					echo "<div class=box_agenda onclick=getListaRefeicao(".$row->id.");>
				  			<ul>
								<li>
									<span>".$row->nome ."<span>
								</li>
								<li>
									" .$row->data."
								</li>
							</ul>
						</div>";


				}

			}
	}

	function selecionarListaRefeicao($idRefeicao){
		$stm = $this->con->prepare("SELECT alimentos_id, quantidade, nome, peso, porcao,calorias FROM refeicao_alimento 
				INNER JOIN alimentos ON refeicao_alimento.alimentos_id = alimentos.id
				WHERE refeicao_id = '$idRefeicao'"); 
		
		sleep(1); 

		$stm->execute();
		
		// Atribui o código HTML para montar uma tabela 
		$tabela = "<h1>Refeição</h1><ul class='resultado content1'>"; 
		$return = "$tabela"; 
		$total = 0;
		while($row = $stm->fetch(PDO::FETCH_OBJ)) {
				$qtd = $row->quantidade;
				$cal = $row->calorias;
				$total_cal = $qtd * $cal;
				$total += $total_cal;
				
				$return.=	"<li class=" . $row->alimentos_id . "><span id=nome-alimento >" . utf8_encode($row->nome) . "</span>";
				$return.=	"<div><strong>Peso:</strong><span id=peso>" . utf8_encode($row->peso) . "g</span></div>";
				$return.=	"<div id=porcao><strong></strong><span>" . utf8_encode($row->porcao) . "</span></div>";
				$return.=	"<div id=qtd><strong>Qtd:</strong><span id=quantidade class=qtd>". utf8_encode($row->quantidade) ."</span></div>";
				$return.=	"<div><strong>Kcal:</strong><span id=calorias class=calorias>" . $total_cal . "</span></div>";
				$return.=   "<p class=hover_add>Adicionar</p></li>";
				}
				  
				 echo $return.="</ul><span onclick=addlistafavoritos() class=addlista>Utilizar lista</span><span onclick=getfavoritar(". $idRefeicao .") class=star>Favoritar</span><span class= total_kcal>" . $total . "Kcal</span>"; 

			
	}	

	function favoritar($idRefeicao){
		$stm = $this->con->prepare("UPDATE refeicao SET favorito = 1 WHERE id = $idRefeicao");
		$stm->execute();

		if($stm->rowCount() == 0 ){

			echo "Não foi possível favoritar a refeição";

		}
		else {
			echo "Adicionado ao favoritos";
		}
	}

	function listaFavoritos($id_usuario){
		$stm = $this->con->prepare("SELECT * FROM refeicao WHERE favorito = 1 AND usuario_id = '$id_usuario'"); 
		$stm->execute();

		$tabela = "<div class=lista_favoritos>
	  				<h1>Lista de Favoritos</h1>"; 
		$return = "$tabela";
		while($row = $stm->fetch(PDO::FETCH_OBJ)) {
	  	// Escreve o valor da coluna FirstName (que está no array $row)
		  $return.="<div class=box_agenda onclick=getListaRefeicao(".$row->id.");>
		  			<ul>
						<li>
							<span>".$row->nome ."<span>
						</li>
						<li>
							" .$row->data ."
						</li>
					</ul>
				</div>";
		  }		
	  $return.= "</div>"; 
	  echo  $return;
	
	}

	function inserirDieta($nomeDieta, $nomePaciente, $desjejum_leite, $desjejum_pao, $desjejum_gordura, $desjejum_frios){

		$stm = $this->con->prepare("INSERT INTO dieta ( usuario_id, nome, desjejum_leite, desjejum_pao, desjejum_gordura, desjejum_frios ) VALUES ('$nomePaciente', '$nomeDieta', '$desjejum_leite', '$desjejum_pao', '$desjejum_gordura', '$desjejum_frios')");
		$stm->execute();

		if( $stm->rowCount()==0 ) {
			echo "Não foi possível criar a dieta.";
		}

		else {
			echo "Dieta cadastrada com sucesso";
		}

	}

	function criarDieta($nome, $id_usuario){
	 	$hoje = date("Y-m-d");
	 	try {
	 		$this->con->beginTransaction();
	 		$this->con->exec("INSERT INTO refeicao (nome, data, usuario_id) VALUES ('$nome', '$hoje', '$id_usuario')");
			$ultimoIdRefeicao = $this->con->lastInsertId();
			//var_dump($ultimoIdRefeicao);
	 		$this->con->exec("INSERT INTO dieta (nome, refeicao_id, usuario_id) VALUES ('$nome', '$ultimoIdRefeicao', '$id_usuario')");
			$this->con->commit();
			
			/*else {
				return $ultimoIdRefeicao;

				//$stm2 = $this->con->prepare("INSERT INTO dieta (nome, refeicao_id, usuario_id) VALUES ('$nome', '$ultimoIdRefeicao', '$id_usuario'");
				//$stm2->execute();
				var_dump($ultimoIdRefeicao);
				if( $stm2->rowCount() == 0 ) {
					echo "Não foi possível inserir a dieta";
				}

			}*/

			//$stm = $this->con->prepare("INSERT INTO refeicao (nome, data, usuario_id) VALUES ('$nome', '$hoje', '$id_usuario')");
			//$stm->execute();
			//mysqli_query($this->conexao, $inserir) or die ("Não foi possível inserir a Refeição");
		} catch (PDOException $e) {
			$this->con->rollback();
			echo "Erro: " . $e->getMessage();
		}
	}

}



?>