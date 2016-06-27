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
    <div class="box_input" id="paciente">
        <h1>Dados de identificação</h1>
        <label><strong>Nome:</strong>Adriano Duarte</label>
        </br>
        <label><strong>Matrícula:</strong> 123</label>           
        </br>
        <label><strong>Data da primeira consulta:</strong> 20/03/2016</label>     
        </br>
        <label><strong>Data de nascimento:</strong> 28/02/1996</label>
        </br>
        <label><strong>Sexo:</strong> Masculino</label>
        </br>
        <label><strong>Cor da pele:</strong> Branca</label>
        </br>
        <label><strong>Filhos:</strong> Não tem</label>
        </br>
        <input type="button" value="Próximo" onclick="proximo('cadastro2');" class="btn-proximo"/>
    </div>   
</div>

<div class="box_centro cadastro2">
    <div class="box_input" id="paciente">
        <h1>Dados de identificação</h1>
        <label><strong>Profissão:</strong> Analista de sistemas</label>
        </br>
        <label><strong>Escolaridade:</strong> Superior incompleto</label>
        </br>
        <label><strong>Estado Civil:</strong> Solteiro</label>
        </br>
        <label><strong>CPF:</strong> 123.456.789-00</label>
        </br>
        <label><strong>Endereço:</strong> Rua Cangussu</label>
        </br>
        <label><strong>CEP:</strong> 90830-010</label>
        </br>
        <label><strong>Telefone:</strong> 3232-3232</label>
        </br>
        <label><strong>E-mail:</strong> adriano.cduarte@hotmail.com</label>
        </br>
        <label><strong>ID:</strong> 3</label>
        </br>
        <label><strong>Data emissão:</strong> 18/08/2004</label>
        </br>
        <label><strong>Pacote:</strong> teste</label>
        </br>
        <input type="button" value="Voltar" onclick="proximo('cadastro1');" class="btn-back"/>
        <input type="button" value="Próximo" onclick="proximo('cadastro3');" class="btn-proximo2"/>
      </div>    
  </div>
<div class="box_centro cadastro3">
  <div class="box_input" id="paciente">
        <h1>Dados Clínicos</h1>
        <label><strong>Objetivo:</strong> Manter</label>
        </br>
        <label><strong>Acompanhamento nutricional:</strong> Nunca</label>
        </br>
        <label><strong>Patologias:</strong> </label>
        </br>
        <label><strong>Historico familiar:</strong> </label>
        </br>
        <label><strong>Tabagista:</strong> Não</label>
        </br>
        <label><strong>Hábito Urinário:</strong> Normal</label>
        </br>
        <label><strong>Hábito Intestinal:</strong> Normal</label>
        </br>
        <label><strong>Náuseas/Vômitos:</strong> Não</label>
        </br>
        <label><strong>Medicações atuais/dose:</strong> Nenhum.</label>
        </br>
        <label><strong>Início da obesidade:</strong> </label>
        </br>
        <input type="button" value="Voltar" onclick="proximo('cadastro2');" class="btn-back"/>
        <input type="button" value="Próximo" onclick="proximo('cadastro4');" class="btn-proximo2"/>
    </div>
</div>

<div class="box_centro cadastro4">
  <div class="box_input" id="paciente">
    <h1>Atividade Física</h1>
    <label><strong>Pratica atividades físicas:</strong> Não</label>
    </br>
    <label><strong>Quais atividades:</strong> Nenhuma</label>
    </br>
    <label><strong>Frequência:</strong> Nenhuma</label>
    </br>
    <label><strong>Duração:</strong> Nenhuma</label>
    </br>
    <input type="button" value="Voltar" onclick="proximo('cadastro3');" class="btn-back"/>
        <input type="button" value="Próximo" onclick="proximo('cadastro5');" class="btn-proximo2"/>
    </div>
</div>

<div class="box_centro cadastro5">
  <div class="box_input" id="paciente">
    <h1>Avaliação Antropométrica</h1>
    <label><strong>PA:</strong> 0 KG</label>
    </br>
    <label><strong>PU:</strong> 0 KG</label>    
    </br>
    <label><strong>Altura:</strong> 175 CM</label>
    </br>
    <label><strong>IMC:</strong> 21 KG/m²</label>
    </br>
    <label><strong>CC:</strong> 0 KG</label>
    </br>
    <label><strong>CQ:</strong> 0 CM</label>
    </br>
    <label><strong>% Gordura:</strong> 0 %</label>
    </br>
    <label><strong>HID:</strong> 0</label>
    </br>
    <label><strong>Relação Cintura/Quadril:</strong> 0</label>
    </br>
    <label><strong>Alteração de peso:</strong> Não</label>
    </br>
    <label><strong>Quantidade de peso alterado:</strong> 0 KG</label>
    </br>
    <label><strong>Tempo:</strong> 3 meses</label>
    </br>
    <label><strong>Classificação:</strong> </label>
    </br>
    <label><strong>G:</strong> </label>
    </br>
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