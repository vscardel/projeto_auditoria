﻿

<?php

	if(isset($_POST['envia_resposta'])){
		header("Location: resposta.php");
	}
	else if(isset($_POST['deletar'])){
		require_once("../model/Dirigente.php");
		session_start();
		$obj_dir = new Dirigente();
		$obj_dir->setSiape($_SESSION['siape_logado']);
		$obj_dir->setSenha($_SESSION['senha_logado']);
	 	$retorno = $obj_dir->efetuaLogin();
	 	$obj_dir->deletaUsuario($retorno); 
	 	header("Location: login.php");
	}
	else if(isset($_POST['alterar'])){
		header("Location: update.php");
	}

	else if(isset($_POST['leave'])){
		header("Location: login.php");
	}

	else if(isset($_POST['minhasResp'])){
		header("Location: minhasRespostas.php");
	}
	else if(isset($_POST['cxEntrada'])){
		header("Location: caixaENtradaDirigente.php");
	}

	echo '
	<!doctype html>

	<html>

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
	    <script type = "text/javascript" src="scriptDirigenteHome.js"> </script> 
	    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/css/bootstrap.min.css">
	  	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.0/jquery.min.js"></script>
	  	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/js/bootstrap.min.js"></script> 
	</head>

	<body>	
		<form action = "dirigenteHome.php" method = "post">

			<div class="row">
				<div class="col-4 panel panel-success rounded-0" id="p1">
			  <div class="panel-heading" id="titulo">Caixa de Entrada (Relatórios)</div>
			  <div class="panel-body">
			  		<div>
						<img src="./mail.png" class="center mt-4 mb-5" alt="Simply Easy Learning" width="100"
			         	height="100">
		         	</div>
					<br>
					Aqui você acessa sua Caixa de Entrada, que é onde os relatórios de auditoria interna que os auditores encaminharam a você são armazenados.
					<button type = "submit" name="cxEntrada" class = "mt-2 mb-3 col-12 btn btn-success"> Go! </button>
			  </div>
			</div>
			<div class="col-3 panel panel-info rounded-0" id="p1">
			  <div class="panel-heading" id="titulo">Escrever Resposta</div>
			  <div class="panel-body">
			  		<div>
						<img src="./notepad.png" class="center mt-4 mb-4" alt="Simply Easy Learning" width="100"
			         	height="100">
		         	</div>
					Bem-vindo Dirigente! <br>
					Aqui você pode escrever uma resposta a algum relatório de auditoria e enviá-lo a um auditor selecionado através do número de relatório associado.
					<button type = "submit" name = "envia_resposta" class = "mt-2 mb-3 col-12 btn btn-info"> Go! </button>
			  </div>
			</div>
				
			<div class="col-4 panel panel-success rounded-0" id="p1">
			  <div class="panel-heading" id="titulo">Minhas Respostas</div>
			  <div class="panel-body">
			  		<div>
						<img src="./archive.png" class="center mt-4 mb-5" alt="Simply Easy Learning" width="100"
			         	height="100">
		         	</div>
					 <br>
					Aqui você encontra o arquivo de respostas a relatórios de auditoria interna que você já escreveu e encaminhou a um ou mais auditores durante a vida.
					<button type = "submit" name="minhasResp" class = "mt-2 mb-3 col-12 btn btn-success"> Go! </button>
			  </div>
			</div>
		</div>
		<div class="row">
			<button type = "submit" name = "leave" class = "ml-2 mt-2 mb-3 col-1 btn btn-danger"> Sair </button>
			<button type = "submit" name = "deletar" class = "mt-2 ml-3 mb-3 btn btn-danger"> Deletar Usuário </button>
			<button type = "submit" name = "alterar" class = "mt-2 ml-3 mb-3 btn btn-info"> Alterar Cadastro </button>
		</div>
	</form>
	</body>

	</html>';

?>
