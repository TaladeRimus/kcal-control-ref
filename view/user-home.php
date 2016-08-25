<html>
<head>
	<?php

		require "../controller/validation.php";
		include "../PDO/UsuariosPDO.class.php";

	if(!isset($_SESSION["id"])){include '../skin/includes/header.inc.php';}
	else{include '../skin/includes/headerLogout.inc.php';} 

	$user = new UsuariosPDO();
	$dados = $user->retornaDados($_SESSION["idusuario"]);
	$peso = $user->buscaPeso($_SESSION["idusuario"]);
	$graph = $user->buscaPesoGraph($_SESSION["idusuario"]);

?>
	<title>Kcal Control</title>
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
	<link href="../skin/style_pesquisa.css" rel="stylesheet" type="text/css">
	<script type="text/javascript" src="https://www.google.com/jsapi"></script>
    <script type="text/javascript">

      // Load the Visualization API and the piechart package.
      google.load('visualization', '1.0', {'packages':['corechart']});

      // Set a callback to run when the Google Visualization API is loaded.
      google.setOnLoadCallback(drawChart);

      // Callback that creates and populates a data table,
      // instantiates the pie chart, passes in the data and
      // draws it.
      function drawChart() {

        // Create the data table.
        var data = new google.visualization.DataTable();
        data.addColumn('string', 'Topping');
        data.addColumn('number', 'Peso');
        data.addRows([
        <?php
        	foreach ($graph as $key => $value) {
        	
          echo "['".$value[1] ."',".$value[0] ."],";
        	}

    
        ?>

        ]);

        // Set chart options
        var options = {'title':'Historico peso:',
                       'width':1000,
                        curveType: 'function',
                       'height':300};

        // Instantiate and draw our chart, passing in some options.
        var chart = new google.visualization.LineChart(document.getElementById('drawchart_div'));
        chart.draw(data, options);
      }
    </script>
</head>
<body>

<div class="content_center">

		   <h2>Gerenciamento da Conta</h2> 
		   
	<div class="box-home" id="box-esq">
		<div class="box-info">
		<ul>
			<li>
				<label>Nome: </label>
				<?php 
					
					echo $dados->nome;

				 ?>
			</li>
			<li>
				<label>Idade: </label>
				<?php 

					echo $newDate = date("Y") - date("Y", strtotime($dados->data_nascimento));

				 ?>
			</li>
			<li>
				<label>Peso: </label>
				<?php 

					echo $peso;

					
				 ?>
			</li>
	
			<li>
				<label>Objetivo: </label>
				<?php 

					echo $dados->objetivo;

				 ?>
			</li>
		</ul>
		</div>
	</div>

	<div class="box-center" id="box-central">
		<div class="box_input">
       		
       		<ul>
				<li>
					<input type="button" value="Atualizar Peso" id="btn_atualizarPeso" id="atualizarPeso" name="atualizarPeso" onClick="location.href='page_atualiza_peso.php'">
				</li>
				<li>
					<input type="button" value="Pesquisar alimentos" id="btn_pesquisarRef" id="pesquisarRef" name="pesquisarRef" onClick="location.href='page_pesquisa_alimentos.php'">
				</li>
				<li>
					<input type="button" value="Pesquisar refeições" id="btn_alterarRef" id="alterarRef" name="alterarRef" onClick="location.href='selecionarRefeicao.php'">
				</li>
				<li>
					<input type="button" value="Ver Dieta" id="btn_dietaRef" id="dietaRef" name="dietaRef" onClick="location.href='ver_dieta.php'">
				</li>
			</ul>
        </div>
    </div>
    <!-- <div id="chart_div"></div> -->
	<div id="drawchart_div"></div>
</div>
<?php include '../skin/includes/footer.inc.php'; ?>


</body>
</html>