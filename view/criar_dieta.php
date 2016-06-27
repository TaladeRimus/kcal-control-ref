<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
  <?php require "../controller/validation.php"; ?>
  <link href="../skin/style_pesquisa.css" rel="stylesheet" type="text/css">
<script type="text/javascript" src="../skin/ajax.js"></script> 
<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Untitled Document</title>
<script type="text/javascript">
function addDieta(){
			var nomeDieta = document.getElementsByName("nomeDieta")[0].value;
			var nomePaciente = document.getElementsByName("nomePaciente")[0].value;
			var ali;
			var vetor = new Array();
			if(nomeDieta != "" && nomePaciente !=""){

				var desjejum_leite = document.getElementsByName("porcao_leite")[0].value;
				var desjejum_pao = document.getElementsByName("porcao_pao")[0].value;
				var desjejum_gordura = document.getElementsByName("porcao_gordura")[0].value;
				var desjejum_frios = document.getElementsByName("porcao_frios")[0].value;


				ajaxAlimento(nomeDieta, nomePaciente, desjejum_leite, desjejum_pao, desjejum_gordura, desjejum_frios);
			}
				if (nomeDieta == null ) {
					$("#nome").css("border","1px solid red");
					$("#msg_pop").html("Preencha o nome da dieta !");
					$(".pop").show(500);
				}
				if (nomePaciente == null) {
					$("#paciente").css("border","1px solid red");
					$("#msg_pop").html("Preencha o nome da dieta !");
					$(".pop").show(500);
				}
			
	}

function ajaxAlimento(nomeDieta, nomePaciente, desjejum_leite, desjejum_pao, desjejum_gordura, desjejum_frios){
		var idUsuario = "<?php echo $_SESSION["idusuario"]?>";
		$.ajax({        
		   type: "POST",
		   url: "../controller/inserir_dieta.php",
		   data: { nomeDieta: nomeDieta, nomePaciente: nomePaciente, desjejum_leite: desjejum_leite, desjejum_pao: desjejum_pao, desjejum_gordura: desjejum_gordura, desjejum_frios: desjejum_frios },
		   success: function(data) {
			   //alert("aaa" + data);
				$("#msg_pop").html(data);
				$(".pop").show(500);        
			},
		   error: function (xhr, ajaxOptions, thrownError) {
        		alert(thrownError);
      		}
		}); 
    };
</script>
</head>
<body id="alimento">
<div id="Container"> 
	<div id="Pesquisar"> 
		<h1 class="titulo">Dieta</h1>   
	</div> 
	<div class="tabela_dieta">
		<div class="salvar_dieta">
		<div class="salvar_alimentos">
			<span id="total" >0</span>
			<span id="txt_total">Kcal</span>
		</div>
		<div>
		<form method="POST" action="pesquisa_alimentos.php">
			<label for="nome">Nome da dieta:</label>
			<input type="text" name="nomeDieta" id="nome" />
			</br>
			</br>
			<label for="nome">Nome do paciente:</label>
			<input type="text" name="nomePaciente" id="nome" />
			</br>
			<div class="grupos">
				<label name="desjejum"><strong>Desjejum</strong></label>
				</br>
				<label name="leite">Grupo do leite</label>
				</br>
				<label for="leite">Porção</label>
				<input type="text"  name="porcao_leite" id="porcao" placeholder="">
				<input type="button" name="btnPesquisar" id="btn-busca-dieta" value="Pesquisar" onclick="getDadosDieta();"/>
				</br>
				</br>
				<label name="pao">Grupo do pão</label>
				</br>
				<label for="pao">Porção</label>
				<input type="text"  name="porcao_pao" id="porcao" placeholder="">
				<input type="button" name="btnPesquisar" id="btn-busca-dieta" value="Pesquisar" onclick="getDadosDieta();"/>
				</br>
				</br>
				<label name="gordura">Grupo da gordura</label>
				</br>
				<label for="gordura">Porção</label>
				<input type="text"  name="porcao_gordura" id="porcao" placeholder="">
				<input type="button" name="btnPesquisar" id="btn-busca-dieta" value="Pesquisar" onclick="getDadosDieta();"/>
				</br>
				</br>
				</br>
				<label name="frios">Frios light</label>
				</br>
				<label for="frios">Porção</label>
				<input type="text"  name="porcao_frios" id="porcao" placeholder="">
				<input type="button" name="btnPesquisar" id="btn-busca-dieta" value="Pesquisar" onclick="getDadosDieta();"/>
				</br>		
				<label>Café <strong>OU</strong> chá: à gosto.</label>
				</br>
				<label>Adoçante sucralose: 3-4 gotas.</label>
			</div>

			<input type="button" name="acao" id="acaos" value="SALVAR" onclick="addDieta();"/> 
		</form>
		</div>
		</div>

		<ul id="nova_tabela" class="resultado content2"> 
		</ul>
	</div> 
	<div id="Resultado" class="resultado content1"></div> 
</div> 
<?php if(!isset($_SESSION["id"])){include '../skin/includes/header.inc.php';}else{include '../skin/includes/headerLogout.inc.php';} ?>
 <?php include '../skin/includes/footer.inc.php'; ?>   
 <?php include '../skin/popup/msg.pop.php'; ?>
</body>
</html>