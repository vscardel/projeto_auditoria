<?php
	require_once('../model/Dirigente.php');
	session_start();
	$obj_dir = new Dirigente();
	$obj_dir->setSiape($_SESSION['siape_logado']);
	$obj_dir->setSenha($_SESSION['senha_logado']);

	if(isset($_POST["volta_home"])){
		header("Location: dirigenteHome.php");
	}

	if(isset($_POST['envia_resp'])){
		if(!empty($_POST['id'])
		and !empty($_POST['prazo'])
		and !empty($_POST['numRelatorio'])
		and isset($_POST['decisao'])
		and !empty($_POST['manifestacao'])){
			$obj_dir->armazenaResposta($_POST['id'],$_POST['prazo'],$_POST['decisao'],
				$_POST['manifestacao'],$_POST['numRelatorio']);
		}
	}

	echo '

	<!doctype html>

	<html>

	<head>
		<meta charset="utf-8">
		<meta name="view-port" content="width=width-device, initial-scale=1.0, shrink-to-fit=no">
		<title>Auditoria Interna - Resposta </title>
	    <link href="https://fonts.googleapis.com/css?family=Open+Sans+Condensed:300" rel="stylesheet">   
	    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.1/css/all.css" integrity="sha384-50oBUHEmvpQ+1lW4y57PTFmhCaXp0ML5d60M1M7uH2+nqUivzIebhndOJK28anvf" crossorigin="anonymous">
	    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">     
		<link rel="stylesheet" type="text/css" href="./styleRelatorio.css">
	    <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>
	    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.mask/1.14.11/jquery.mask.min.js"></script> 
	    <script type = "text/javascript" src="scriptRelatorio.js"> </script>  
	</head>

	<body> 
		<form action = "resposta.php" method = "post">
		<button type = "submit" name = "volta_home" class = "mt-2 mb-3 col-12 btn btn-info"> Home </button>
	    <div class = "container-fluid rounded-0">
	        <h3 class = "mt-1 text-center" id = "titulo"> Resposta </h3>
	        <div class = "mt-3 container rounded-0" id = "container-relatorio">
	            <form name = "form-relatorio" onsubmit = "return retornaData();"> 
	            	<div class="row">
	            		<div class = "col-4 form-group mt-3">
		                    <label for = "id"> ID da Resposta </label>
		                    	<input type = "text" name="id" class = "form-control" id = "id">	
		                </div>
		            	<div class = "col-4 form-group mt-3">
		                    <label for = "prazo"> Prazo </label>
		                    	<input type = "text" name="prazo" class = "form-control" id = "prazo">	
		                </div>
		                <div class = "col-4 form-group mt-3">
		                    <label for = "numRelatorio"> Nº Relatório </label>
		                    	<input type = "text" name="numRelatorio" class = "form-control" id = "numRelatorio">	
		                </div>

	                </div>
	            	<div class = "row">
		            	<div class = "col-4 form-group">
		                    <label for = "decisao"> Decisão </label> 
		                    <select name="decisao"  id="decisao">
		                    	<option id="naoImplementada" value="0"> Sugestão não implementada </option>	                    	
		                    	<option id="implementada" value="1"> Sugestão implementada </option>
		                    </select>
		                </div>
		            </div>
		            <div class = "row">
		                <div class = "col-12 form-group">
		                    <label for = "manifestacao"> Manifestação</label>
		                    <textarea type = "text" name = "manifestacao" class = "form-control" id = "manifestacao" rows="6"></textarea>
		                </div>
		            </div>
		           	<div class="row">
		            	<div class="col-3">
	               			<button type = "submit" name="envia_resp" class = "mt-2 mb-3 col-12 btn btn-success"> Send </button>
	               		</div>
	               	</div>
	            </form>
	        </div>
	   </div>
	</form>
	</body>

	</html>';

?>