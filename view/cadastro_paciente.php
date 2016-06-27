<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Untitled Document</title>
<link href="../skin/style_pesquisa.css" rel="stylesheet" type="text/css">
<script type="text/javascript" src="../js/ajax.js"></script> 
<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script>
<script language="JavaScript">
function proximo(variavel){
  $(".box_centro").hide(500);
  $("."+variavel).show(500);    
};
function addalimento(aux){
      $("."+aux).show(500);
    $(".TB_overlay").show(500);
}
</script>
</head>

<body>
 <?php include '../skin/includes/header.inc.php'; ?>
<div class="content_box">
<div class="box_centro cadastro1">
<form action="#" method="post" >
    <div class="box_input">
        <h1>Dados de identificação</h1>
        <input type="text" name="nome" placeholder="Nome Completo"/>    
        <input type="text" name="matricula" placeholder="Matrícula">           
        <label>Data da primeira consulta</label><input type="date" name="data_consulta" placeholder="">           
      	<label>Data de nascimento</label><input type="date" name="data_nascimento">
      	<label>Sexo</label>
        <select name="sexo" id="sexo">            
                <option value="M">Masculino</option>
                <option value="F">Feminino</option>
      	</select>
        <input type="text" name="cor_pete" placeholder="Cor da pele"/>
        <label>Filhos</label>
        <select name="filhos" id="filhos">	
        	<option value="1">1</option>
        	<option value="2">2</option>
        	<option value="3">3</option>
      	</select>
        <input type="button" value="Próximo" onclick="proximo('cadastro2');" class="btn-proximo"/>
    </div>   
</div>

<div class="box_centro cadastro2">
    <div class="box_input">
        <h1>Dados de identificação</h1>
        <input type="text" name="profissao" placeholder="Profissão"/>    
        <input type="text" name="escolaridade" placeholder="Escolaridade">           
        <label>Estado Civil: </label>
        <select name="objetivo">
          <option value="solteiro" name="solteiro">Solteiro</option>
          <option value="casado" name="casado">Casado</option>
          <option value="divorciado" name="divorciado">Divorciado</option>
          <option value="viuvo" name="viuvo">Viúvo</option>
        </select>
        <input type="text" name="cpf" placeholder="CPF">
        <input type="text" name="endereco" placeholder="Endereço">
        <input type="text" name="cep" placeholder="CEP">
        <input type="text" name="telefone" placeholder="Telefone">
        <input type="email" name="email" placeholder="E-mail">
        <input type="text" name="id" placeholder="ID">
        <label>Data emissão</label>
        <input type="date" name="data_emissao">
        <inpute type="text" name="pacote" placeholder="pacote">
        <input type="button" value="Voltar" onclick="proximo('cadastro1');" class="btn-back"/>
        <input type="button" value="Próximo" onclick="proximo('cadastro3');" class="btn-proximo2"/>
      </div>    
  </div>
<div class="box_centro cadastro3">
	<div class="box_input">
        <h1>Dados Clínicos</h1>
        <label>Objetivo</label>
        <select name="objetivo" id="objetivo">	
        	<option value="ganhar">Ganhar</option>
        	<option value="perder">Perder</option>
        	<option value="manter">Manter</option>
      	</select>
      	<input type="text" name="acompanhamento" placeholder"Acompanhamento nutricional">
      	<label>Patologias</label>
      	<select multiple id="patologias" name="patologias">
      		<option>DM Tipo I</option>
      		<option>DM Tipo II</option>
      		<option>HAS</option>
      		<option>Dislipidemia</option>
      		<option>Obesidade</option>
      		<option>Pneumopatia</option>
      		<option>Cardiopatia</option>
      		<option>Hepatopatia</option>
      		<option>HIV/AIDS</option>
      		<option>Anemia</option>
      		<option>SM</option>
      		<option>Osteoporose</option>
      	</select>
      	<label>Historico familiar</label>
      	<select multiple id="patologias" name="historico_familiar">
      		<option>DM</option>
      		<option>HAS</option>
      		<option>Dislipidemia</option>
      		<option>Obesidade</option>
      	</select>
      	<label>Tabagista</label>
      	<select name="tabagista">
      		<option>Sim</option>
      		<option>Não</option>
      	</select>
      	<input type="text" name="habito_urinario" placeholder="Hábito urinário">
      	<input type="text" name="habito_intestinal" placeholder="Hábito intestinal">
      	<label>Náuseas/Vômitos</label>
      	<select name="tabagista">
      		<option>Sim</option>
      		<option>Não</option>
      	</select>
      	<label>Medicações atuais/dose</label>
      	</br>
      	<textarea id="medicacoes" name="medicacoes"></textarea>
      	</br>
      	<input text="text" name="obesidade_inicio" placeholder="Início da obesidade">
      	<input type="button" value="Voltar" onclick="proximo('cadastro2');" class="btn-back"/>
      	<input type="button" value="Próximo" onclick="proximo('cadastro4');" class="btn-proximo2"/>
    </div>
</div>

<div class="box_centro cadastro4">
	<div class="box_input">
		<h1>Atividade Física</h1>
		<label>Pratica atividades físicas ?</label>
		<select name="atividades_fisicas">
			<option>Sim</option>
			<option>Não</option>
		</select>
		<label>Quais atividades ?</label>
		<textarea name="atividades_realizadas" id="medicacoes"></textarea>
		</br>
		<input type="text" name="frequencia_atividade" placeholder="Frequência">
		<input type="text" name="duracao_atividade" placeholder="Duração">
		<input type="button" value="Voltar" onclick="proximo('cadastro3');" class="btn-back"/>
      	<input type="button" value="Próximo" onclick="proximo('cadastro5');" class="btn-proximo2"/>
    </div>
</div>

<div class="box_centro cadastro5">
	<div class="box_input" id="antropometrico">
		<h1>Avaliação Antropométrica</h1>
		<input type="text" name="pa" placeholder="PA">KG
		<input type="text" name="pu" placeholder="PU">KG		
		<input type="text" name="altura" id="altura" placeholder="altura">CM
		<input type="text" name="imc" id="imc" placeholder="IMC">KG/m²
		<input type="text" name="CC" placeholder="CC">KG
		<input type="text" name="CQ" placeholder="CQ">CM
		<input type="text" name="perc_gordura" placeholder="% Gordura">%
		<input type="text" name="hid" placeholder="HID">
		<input type="text" name="rel_cintura" placeholder="Relação Cintura/Quadril">
		<label>Alteração de peso</label>
		<select name="alteracao_peso">
			<option>Não</option>
			<option>Ganho</option>
			<option>Perda</option>
		</select>
		<input type="text" name="alteracao_qtd" placeholder="Quantidade de peso alterado">
		<input type="text" name="alteracao_tempo" placeholder="Tempo">
		<label>Classificação</label>
		<select name="classificacao">
			<option>Desnutrido</option>
			<option>Eutrófico</option>
			<option>Sobrepeso</option>
			<option>Obesidade</option>
		</select>
		<input type="text" name="g" placeholder="G">
		<input type="button" value="Voltar" onclick="proximo('cadastro4');" class="btn-back"/>
        <input name="cadastrar" type="submit" value="Salvar" class="btn-proximo-mini"/>
	</div>
</div>
</form>    
</div>
</div>
 <?php include '../skin/includes/footer.inc.php'; ?>  
</body>
</html>