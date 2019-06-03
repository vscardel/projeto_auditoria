
<?php

require_once('../model/Auditor.php');

session_start();
$obj_auditor = new Auditor();
$obj_auditor->setSiape($_SESSION['siape_logado']);
$obj_auditor->setSenha($_SESSION['senha_logado']);



if(isset($_POST["envia_relatorio"])){
	if(!empty($_POST['dirigente'])
	and !empty($_POST['num_relatorio'])
	and !empty($_POST['data'])
	and !empty($_POST['acao'])
	and !empty($_POST['introducao'])
	and !empty($_POST['escopo'])
	and !empty($_POST['exame'])){
		$obj_auditor->armazenaRelatorio($_POST['num_relatorio'],$_SESSION['siape_logado'],$_POST['dirigente'],
		$_POST['acao'],$_POST['data'],$_POST['escopo'],$_POST['introducao'],$_POST['exame']);
	}
}


echo '<!doctype html>

<html>

<head>
	<meta charset="utf-8">
	<meta name="view-port" content="width=width-device, initial-scale=1.0, shrink-to-fit=no">
	<title>Auditoria Interna - Relatorio</title>
    <link href="https://fonts.googleapis.com/css?family=Open+Sans+Condensed:300" rel="stylesheet">   
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.1/css/all.css" integrity="sha384-50oBUHEmvpQ+1lW4y57PTFmhCaXp0ML5d60M1M7uH2+nqUivzIebhndOJK28anvf" crossorigin="anonymous">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">     
	<link rel="stylesheet" type="text/css" href="./styleRelatorio.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.mask/1.14.11/jquery.mask.min.js"></script> 
    <script type = "text/javascript" src="scriptRelatorio.js"> </script>  
</head>

<body> 
    <div class = "container-fluid rounded-0">
        <h3 class = "mt-1 text-center" id = "titulo"> Relatorio de Auditoria</h3>
        <div class = "mt-3 container rounded-0" id = "container-relatorio">
            <form action = "relatorio.php" method = "post" name = "form-relatorio"> 
            	<div class = "form-group mt-3">
					<label for = "dirigente"> Dirigente Associado </label>
					<input type = "text" name = "dirigente" class = "form-control input-sm" id = "numero">
                </div>
            	<div class = "row">
	            	<div class = "col-4 form-group">
	                    <label for = "numero"> Nº do Relatório</label> 
	                    <input type = "text" name = "num_relatorio" class = "form-control input-sm" id = "numero">
	                </div>
	                <div class = "col-4 form-group">
	                    <label for = "data"> Data </label>
	                    <input type = "date" name = "data" class = "form-control input-sm" id = "data">
	                </div>
	            </div>
	            <div class = "row">
	                <div class = "col-9 form-group">
	                    <label for = "acao"> Ação de auditoria</label>
	                    <textarea type = "text" name = "acao" class = "form-control input-sm" id = "acao" rows="2"></textarea>
	                </div>
	            </div>
                <div class="row">     
	      			<div class = "col-9 form-group">
	                    <label for = "introducao"> Introdução </label> <br>
             	        <textarea type = "text" name = "introducao" class = "form-control input-sm" rows="4" id = "introducao"></textarea>
	                </div>	      
	            </div>
	            <div class="row">     
	      			<div class = "col-9 form-group">
	                    <label for = "escopo"> Escopo </label> <br>
             	        <textarea type = "text" name = "escopo" class = "form-control input-sm" rows="6" id = "escopo"></textarea>
	                </div>	      
	            </div>
	            <div class="row">     
	      			<div class = "col-9 form-group">
	                    <label for = "exames"> Exames </label> <br>
             	        <textarea type = "text" name = "exame" class = "form-control input-sm" rows="4" id = "exames"></textarea>
	                </div>	      
	            </div>
	            <div class="row">
	            	<div class="col-3">
               			<button type = "submit" name = "envia_relatorio" class = "mt-2 mb-3 col-12 btn btn-success"> Send </button>
               		</div>
               	</div>
            </form>
        </div>
   </div>
</body>

</html>';
?>

