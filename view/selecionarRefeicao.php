﻿<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>

  <?php require "../controller/validation.php"; ?>

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
  <?php if(!isset($_SESSION["id"])){include '../skin/includes/header.inc.php';}
        else{include '../skin/includes/headerLogout.inc.php';} ?>

	<div id="Container">
       <div id="Pesquisar"> 
           <h1 class="titulo">Minhas refeições</h1>
           <input type="text"  name="txtdata" id="txtdata" placeholder="O que você comeu hoje ?">
           <input type="button" name="btnPesquisar" id="btn-busca" value="Pesquisar" onclick="getRefeicao();"/> 
           <input type="button" value="add" id="btn-add" onclick="addalimento('addalimento');">
   		</div> 
        <div id="Resultado" class="content"></div> 
    </div>
     <?php include '../skin/popup/msg.pop.php'; ?>
 <?php include '../skin/includes/footer.inc.php'; ?>
</body>
</html>

