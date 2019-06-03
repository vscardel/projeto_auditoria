
<?php

	require_once("../model/Auditor.php");
	session_start();
	$obj_auditor = new Auditor();
	$obj_auditor->setSiape($_SESSION['siape_logado']);
	$obj_auditor->setSenha($_SESSION['senha_logado']);
	$tabela = $obj_auditor->recuperaRelatorios();

	if(isset($_POST["volta_home"])){
		header("Location: auditorHome.php");
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
		<form action="CaixaRelatorioAuditor.php" method="post">
		<button type = "submit" name = "volta_home" class = "mt-2 mb-3 col-12 btn btn-info"> Home </button>
		<div class="container">
		  <h2 id="titulo">Meus Relatórios</h2>
		  <table class="table">
		    <thead class="table-info">
		      <tr>
		        <th>Siape do Dirigente</th>
		        <th>Número do Relatório</th>
		        <th>Ação</th>
		        <th>Data</th>
		        <th>Escopo</th>
		        <th>Introdução</th>
		        <th>Exame</th>
		      </tr>
		    </thead>
		    <tbody>
		    ';

		    if(isset($tabela)){
		    	foreach ($tabela as $value) {
		    		echo '<tr> <td>'.$value['dirigente'].'</td>'.'<td>'.$value['numero_relatorio'].'</td>'.
		    		'<td>'.$value['acao'].'</td>'.
		    		'<td>'.$value['data'].'</td>'.
		    		'<td>'.$value['escopo'].'</td>'.
		    		'<td>'.$value['intr'].'</td>'
		    		.'<td>'.$value['exame'].'</td>'.'</tr>'; 
		    	}
		    }

		echo' </tbody>
		 	 </table>
			 </div>
			 </form>
		</body>

	</html>';

?>
