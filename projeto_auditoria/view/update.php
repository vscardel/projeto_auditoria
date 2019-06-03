<?php
require_once("../model/Usuario.php");
session_start();


$obj_usuario = new Usuario();
$obj_usuario->setSiape($_SESSION['siape_logado']);
if (isset($_POST['alterar'])) {
	$obj_usuario->alteraCadastro($_POST['nome'],$_POST['senhaNova']);
	header("Location: login.php");
}

echo '<!doctype html>

<html>

<head>
	<meta charset="utf-8">
	<meta name="view-port" content="width=width-device, initial-scale=1.0, shrink-to-fit=no">
	<title>Auditoria Interna</title>
    <link href="https://fonts.googleapis.com/css?family=Open+Sans+Condensed:300" rel="stylesheet">   
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.1/css/all.css" integrity="sha384-50oBUHEmvpQ+1lW4y57PTFmhCaXp0ML5d60M1M7uH2+nqUivzIebhndOJK28anvf" crossorigin="anonymous">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">     
	<link rel="stylesheet" type="text/css" href="./styleCadastro.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.mask/1.14.11/jquery.mask.min.js"></script> 
    
</head>

<body> 
    <div class = "container-fluid rounded-0">
        <h3 class = "mt-1 text-center" id = "titulo"> Alterar Cadastro </h3>
        <div class = "mt-3 container rounded-0" id = "container-cadastro">
            <form action="update.php" method="post" name = "form-cadastro" onsubmit = "return validaSenha();"> 
            	<div class = "row">
	            	<div class = "col-6 form-group">
	                    <label for = "nome"> Nome completo</label> 
	                    <input type = "text" class = "form-control" id = "nome" name="nome">
	                </div>
	            </div>
	            <div class = "row">
	                <div class = "col-6 form-group">
	                    <label for = "senha"> Nova senha </label>
	                    <input type = "password" class = "form-control" id = "senhaNova" name="senhaNova">
	                </div>
	                <div class = "col-6 form-group">
	                    <label for = "rsenha"> Repita a senha </label>
	                    <input type = "password" class = "form-control" id = "rsenha" name="rsenha">
                	</div>
	            </div>
            	<button type = "submit" name="alterar" class = "mt-2 mb-3 col-12 btn btn-success"> Alterar </button>
            </form>
        </div>
   </div>
</body>

</html>';
?>
