<!doctype html>

<?php

	if(isset($_POST['redireciona_caixa_entrada_auditor'])){
		header("Location: caixaEntradaAuditor.php");
	}
	else if(isset($_POST['redireciona_caixa_relatorio_auditor'])){
		header("Location: CaixaRelatorioAuditor.php");
	}
	else if(isset($_POST['redireciona_relatorio_auditor'])){
		header("Location: relatorio.php");
	}

	echo '<html>

<head>
	<meta charset="utf-8">
	<meta name="view-port" content="width=width-device, initial-scale=1.0, shrink-to-fit=no">
	<title>Auditoria Interna - Home</title>
    <link href="https://fonts.googleapis.com/css?family=Open+Sans+Condensed:300" rel="stylesheet">   
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.1/css/all.css" integrity="sha384-50oBUHEmvpQ+1lW4y57PTFmhCaXp0ML5d60M1M7uH2+nqUivzIebhndOJK28anvf" crossorigin="anonymous">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">     
	<link rel="stylesheet" type="text/css" href="./styleAuditorHome.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.mask/1.14.11/jquery.mask.min.js"></script> 
    <script type = "text/javascript" src="scriptRelatorio.js"> </script> 
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/css/bootstrap.min.css">
  	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.0/jquery.min.js"></script>
  	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/js/bootstrap.min.js"></script> 
</head>

<body>
	<form action = "auditorHome.php" method = "post">
		<div class="row">
			<div class="col-4 panel panel-info rounded-0" id="p1">
			  <div class="panel-heading" id="titulo">Caixa de Entrada (Respostas)</div>
			  <div class="panel-body">
			  		<div>
						<img src="./mail.png" class="center mt-4 mb-5" alt="Simply Easy Learning" width="100"
			         	height="100">
		         	</div>
					<br>
					Aqui você acessa sua Caixa de Entrada, que é onde as respostas que os dirigentes encaminharam a você quanto ao seu(s) relatório(s) de auditoria são armazenadas.
					<button type = "submit" name = "redireciona_caixa_entrada_auditor" class = "mt-2 mb-3 col-12 btn btn-info"> Go! </button>
			  </div>
			</div>
			<div class="col-3 panel panel-success rounded-0" id="p1">
			  <div class="panel-heading" id="titulo">Escrever Relatório de Auditoria</div>
			  <div class="panel-body">
			  		<div>
						<img src="./notepad.png" class="center mt-4 mb-4" alt="Simply Easy Learning" width="100"
			         	height="100">
		         	</div>
					Bem-vindo Auditor! <br>
					Aqui você pode escrever um relatório de auditoria e enviá-lo a um dirigente selecionado através da matrícula SIAPE do mesmo.
					<button type = "submit" name = "redireciona_relatorio_auditor" class = "mt-2 mb-3 col-12 btn btn-success"> Go! </button>
			  </div>
			</div>
				
			<div class="col-4 panel panel-info rounded-0" id="p1">
			  <div class="panel-heading" id="titulo">Meus Relatórios</div>
			  <div class="panel-body">
			  		<div>
						<img src="./archive.png" class="center mt-4 mb-5" alt="Simply Easy Learning" width="100"
			         	height="100">
		         	</div>
					 <br>
					Aqui você encontra o arquivo de relatórios de auditoria interna que já escreveu e encaminhou a um ou mais dirigentes durante a vida.
					<button type = "submit" name = "redireciona_caixa_relatorio_auditor" class = "mt-2 mb-3 col-12 btn btn-info"> Go! </button>
			  </div>
			</div>
		</div>
	</form>
</body>

</html>'


?>

