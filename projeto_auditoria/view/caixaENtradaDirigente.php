<?php

	require_once("../model/Dirigente.php");
	session_start();
	$obj_dir = new Dirigente();
	$obj_dir->setSiape($_SESSION['siape_logado']);
	$obj_dir->setSenha($_SESSION['senha_logado']);
	$tabela = $obj_dir->recuperaRelatorios();
	
	if(isset($_POST["volta_home"])){
		header("Location: dirigenteHome.php");
	}

	echo '
	<!doctype html>

	<html>

	<head>
		<meta charset="utf-8">
		<meta name="view-port" content="width=width-device, initial-scale=1.0, shrink-to-fit=no">
		<title>Auditoria Interna</title>
	    <link href="https://fonts.googleapis.com/css?family=Open+Sans+Condensed:300" rel="stylesheet">   
	    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.1/css/all.css" integrity="sha384-50oBUHEmvpQ+1lW4y57PTFmhCaXp0ML5d60M1M7uH2+nqUivzIebhndOJK28anvf" crossorigin="anonymous">
	    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">     
		<link rel="stylesheet" type="text/css" href="./styleCaixaEntradaAuditor.css">
		<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
	  	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>
	    <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>
	    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.mask/1.14.11/jquery.mask.min.js"></script> 
	    <script type = "text/javascript" src="scriptCaixaEntradaAuditor.js"> </script>  
	</head>

	<body> 
		<form action="caixaENtradaDirigente.php" method="post">
		<button type = "submit" name = "volta_home" class = "mt-2 mb-3 col-12 btn btn-info"> Home </button>
		<div class="container">
		  <h2 id="titulo">Caixa de Entrada</h2>
		  <table class="table">
		    <thead class="table-info">
		      <tr>
		        <th>Siape do Auditor</th>
		        <th>Número do Relatório</th>
		        <th>Ação</th>
		        <th>Escopo</th>
		        <th>Introdução</th>
		        <th>Exame</th>
		      </tr>
		    </thead>
		    <tbody>
		    ';

		    if(isset($tabela)){
		    	foreach ($tabela as $value) {
		    		echo '<tr> <td>'.$value['auditor'].'</td>'.'<td>'.$value['num_rel'].'</td>'.
		    		'<td>'.$value['acao'].'</td>'.
		    		'<td>'.$value['escopo'].'</td>'.
		    		'<td>'.$value['intro'].'</td>'
		    		.'<td>'.$value['exames'].'</td>'.'</tr>'; 
		    	}
		    }

		echo' </tbody>
		 	 </table>
			 </div>
			 </form>
		</body>

	</html>';

?>
