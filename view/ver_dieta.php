<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>

  <?php require "../controller/validation.php"; 
        include "../PDO/AlimentosPDO.class.php";
  ?>

<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
	<title>Consulta Refeição Console</title>
    <link href="../skin/style_pesquisa.css" rel="stylesheet" type="text/css">
<script type="text/javascript" src="../skin/ajax.js"></script> 
<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script>
<script language="JavaScript">

var idUsuario = "<?php echo $_SESSION["idusuario"]?>";

</script>
</head>
<body id="refeicao">
   
  <?php  
        $dietaObj = new AlimentosPDO();
        $dieta = $dietaObj->selecionarDieta($_SESSION["idusuario"]);

        if(!isset($_SESSION["id"])){include '../skin/includes/header.inc.php';}
        else{include '../skin/includes/headerLogout.inc.php';} 
    


  ?>

	<div id="Container">
      <div id="Pesquisar"> 
           <h1 class="titulo">Minhas dietas</h1>
           <!-- <input type="text"  name="txtdata" id="txtdata" placeholder="Digite o nome da dieta"> -->
           <!-- <input type="button" name="btnPesquisar" id="btn-busca" value="Pesquisar" onclick="getDieta();"/> --> 
   		</div> 
      <div id="resultado" class="content">
        <div id='porcoes_dieta' align="left">
        <div><strong>Desjejum:</strong></div>
        <div><strong>Grupo do leite: </strong><span> <?php echo $dieta->desjejum_leite; ?></span> porções.</div>
        <div><strong>Grupo do pão: </strong><span> <?php echo $dieta->desjejum_pao; ?></span> porções.</div>
        <div><strong>Grupo da gordura: </strong><span> <?php echo $dieta->desjejum_gordura; ?>  </span> porções.</div>
        <div><strong>Frios Light: </strong><span> <?php echo $dieta->desjejum_frios; ?> </span> porções.</div>
        <label>Café <strong>OU</strong> chá: à gosto.</label>
         </br>
         <label>Adoçante sucralose: 3-4 gotas.</label>
         </div> 
        <div id="porcoes_alimentos" align="center">
          <label><strong>Grupo do leite</strong></label>
          </br>
          <label>leite desnatado (1 copo 200ML) <strong>OU</strong> leite em pó desnatado (2 colheres de sopa = 20g)</label>
          </br>
          </br>
          <label><strong>Grupo do pão</strong></label>
          </br>
          <label>pão integral (1 fatia) <strong>OU</strong> pão light (1 fatia)</label>
          </br>
          </br>
          <label><strong>Grupo da gordura</strong></label>
          </br>
          <label>1 colher de chá de creme vegetal <strong>OU</strong> 1 colher de chá de margarina light</label>
        </div>
        <div id="recomendacao_alimentos" align="right">
          <label><strong>Recomendação de refeição</strong></label>
          </br>
          </br>
          <div id="recomenda_refeicao">
          <label>leite em pó desnatado</label>
          </br>
          <label>pão integral</label>
          </br>
          <label>margarina light</label>
          </div>
        </div>
      </div>

</div>
     <?php include '../skin/popup/msg.pop.php'; ?>
 <?php include '../skin/includes/footer.inc.php'; ?>
</body>
</html>

