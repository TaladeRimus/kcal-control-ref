<?php
	
include "BancoPDO.class.php";

class UsuariosPDO extends BancoPDO {

	public function __construct(){

		$this->con = BancoPDO::conectar();

	}

	public function inserirUsuario($usuario){

		$nome = $usuario->nome;
		var_dump($nome);
		die();

		try {

			
			$stm = $this->con->prepare("insert into usuario (id, nome, email, sexo, senha, altura, peso, idade, objetivo) values (?,?,?,?,?,?,?,?,?)");
		/*$id = $usuario->id;
		$nome = $usuario->nome;
		$email = $usuario->email;
		$sexo = $usuario->sexo;
		$senha = $usuario->senha;
		$altura = $usuario->altura;
		$peso = $usuario->peso;
		$idade = $usuario->idade;
			$objetivo = $usuario->objetivo;*/

			$stm->bindValue(1, $usuario->id);
			$stm->bindValue(2, $usuario->nome);
			$stm->bindValue(3, $usuario->email);
			$stm->bindValue(4, $usuario->sexo);
			$stm->bindValue(5, $usuario->senha);
			$stm->bindValue(6, $usuario->altura);
			$stm->bindValue(7, $usuario->peso);
			$stm->bindValue(8, $usuario->idade);
			$stm->bindValue(9, $usuario->objetivo);
			$stm->execute();
			echo "<script>alert('Usuario criado com sucesso')</alert>";


		} catch (Exception $e) {
			echo "Erro: " . $e->getMessage();
		}

	}


}

?>