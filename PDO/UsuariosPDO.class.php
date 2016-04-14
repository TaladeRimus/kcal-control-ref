<?php
	
include "BancoPDO.class.php";

class UsuariosPDO extends BancoPDO {

	public function __construct(){

		$this->con = BancoPDO::conectar();

	}

	public function inserirUsuario(Usuario $usuario){


		try {

			
			$stm = $this->con->prepare("insert into usuario (nome, email, sexo, senha, altura, peso, idade, objetivo) 
										values (':nome', ':email', ':sexo', ':senha', ':altura', ':peso', ':idade', ':objetivo')");
			

			$stm->execute($usuario->toArray());
			
			echo "Usuário cadastrado com sucesso";


		} catch (Exception $e) {
			echo "Erro: " . $e->getMessage();
		}

	}

	public function autenticar($email, $senha){


		try {

			$stm = $this->con->prepare("SELECT * from usuario 
										where email = '".$email."' and senha = '".$senha."'");

			$stm->execute();

			if ($stm->rowCount() == 0) {
				return null;
			}

			else {
				$dados = $stm->fetch(PDO::FETCH_OBJ);

				return $dados;
			}

			
		} catch (Exception $e) {
			echo "Erro: " . $e->getMessage();
		}

	}

	public function retornaDados($id){


		$stm = $this->con->prepare("SELECT * FROM usuario 
									WHERE id = '".$id."'");

		$stm->execute();

		if($stm->rowCount() == 0 ) {
			return null;
		}
		else {
			$dados = $stm->fetch(PDO::FETCH_OBJ);

			return $dados;
		}
	}

	public function buscaPeso(){

		$stm = $this->con->prepare("SELECT *,DATE_FORMAT(data_pesagem, '%d/%m/%y')
									as novaData 
									FROM historico_peso 
									ORDER BY data_pesagem ASC");
	}

	public function inserePeso(){

	}

}

?>