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
<form action="../controller/acoes.php" method="post" >
    <div class="box_input">
        <h1>Dados Pessoais</h1>
        <input type="text" name="nome" placeholder="Nome Completo"/>    
        <input type="text" name="email" placeholder="E-mail">           
        <select name="sexo" id="sexo">
            <optgroup label="Sexo">
                <option value="M">Masculino</option>
                <option value="F">Feminino</option>
            </optgroup>
      </select>
        <input type="password" name="senha" placeholder="Senha"/>
        <input type="password" name="confirmaSenha" placeholder="Confirme sua Senha"/>
        <input type="button" value="Próximo" onclick="proximo('cadastro2');" class="btn-proximo"/>
    </div>   
</div>

<div class="box_centro cadastro2">
    <div class="box_input">
        <h1>Dados Físico</h1>
        <input type="text" name="altura" placeholder="Altura"/>    
        <input type="text" name="peso" placeholder="Peso">           
        <input type="text" name="idade" placeholder="Idade"/>
        <label>Objetivo: </label>
        <select name="objetivo">
          <option value="perder" name="perder">Perder peso</option>
          <option value="ganhar" name="ganhar">Ganhar peso</option>
          <option value="controlar" name="controlar">Controlar peso</option>
        </select>
        <input type="button" value="Voltar" onclick="proximo('cadastro1');" class="btn-back"/>
        <input name="cadastrar" type="submit" value="Salvar" class="btn-proximo-mini"/>
      </div>    
  </div>

</form>    
</div>
</div>
 <?php include '../skin/includes/footer.inc.php'; ?>  
</body>
</html>