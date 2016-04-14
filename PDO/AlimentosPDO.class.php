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

	function incluirRefeicao($nome, $id_usuario){
	 	$hoje = date("Y-m-d");
		$stm = $this->con->prepare("INSERT INTO refeicao (nome, data, id_usuario) VALUES ('$nome', '$hoje', '$id_usuario')");

		$stm->execute();
		//mysqli_query($this->conexao, $inserir) or die ("Não foi possível inserir a Refeição");
			
		if ( $stm->rowCount() == 0 ) {
			"Não foi possível inserir a refeição";
		}

		$ultimoIdRefeicao = $this->con->lastInsertId();

		return $ultimoIdRefeicao;
	}

	function incluirRefeicaoAlimento($ultimoIdInserido, $idAlimento, $quantidade){
		$stm = $this->con->prepare("INSERT INTO refeicao_alimento (id_refeicao ,id_alimento, quantidade) VALUES ('$ultimoIdInserido', '$idAlimento', '$quantidade')");

		//$resultado = mysqli_query($this->conexao, $inserir) or die ("Não foi possível inserir a Refeição");
		$stm->execute();

		if($stm->rowCount() == 0 ) {
			echo "Não foi possível inserir a refeição";
		}
	}	


	function selecionarRefeicao($data, $idUsuario){

		if (empty($data)) { 
				$stm = $this->con->prepare("SELECT * FROM refeicao WHERE id_usuario = '$idUsuario'"); 
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
		$stm = $this->con->prepare("SELECT id_alimento, quantidade, nome, peso, porcao,calorias FROM refeicao_alimento 
				INNER JOIN alimentos ON refeicao_alimento.id_alimento = alimentos.id
				WHERE id_refeicao = '$idRefeicao'"); 
		
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
				
				$return.=	"<li class=" . $row->id_alimento . "><span id=nome-alimento >" . utf8_encode($row->nome) . "</span>";
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
		$stm = $this->con->prepare("SELECT * FROM refeicao WHERE favorito = 1 AND id_usuario = '$id_usuario'"); 
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


}



?>