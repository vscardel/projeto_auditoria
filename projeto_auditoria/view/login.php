<?php

require_once("../model/Usuario.php");
session_start();

$obj_usuario = new Usuario();

if(isset($_POST['siape']) and isset($_POST['senha'])){	

	$obj_usuario->setSiape($_POST['siape']);
	$obj_usuario->setSenha($_POST['senha']);

	$flag = $obj_usuario->efetuaLogin();

    if($flag != 0){

        $_SESSION['siape_logado'] = $_POST['siape'];
        $_SESSION['senha_logado'] = $_POST['senha'];
        
    	if($flag == 1){ //auditor
    		header("Location: auditorHome.php");
    	}
    	//alterar
    	else if($flag == 3){ //dirigente
    		header("Location: auditorHome.php");
    	}
    }
}


echo ' <!doctype html>

<html>

<head>
	<meta charset="utf-8">
	<meta name="view-port" content="width=width-device, initial-scale=1.0, shrink-to-fit=no">
	<title>Auditoria Interna - Login </title>
    <link href="https://fonts.googleapis.com/css?family=Open+Sans+Condensed:300" rel="stylesheet">   
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.1/css/all.css" integrity="sha384-50oBUHEmvpQ+1lW4y57PTFmhCaXp0ML5d60M1M7uH2+nqUivzIebhndOJK28anvf" crossorigin="anonymous">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">     
	<link rel="stylesheet" type="text/css" href="./styleLogin.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.mask/1.14.11/jquery.mask.min.js"></script> 
    <script type = "text/javascript" src="scriptLogin.js"> </script>  
</head>

<body> 
    <div class = "container-fluid rounded-0">
        <h3 class = "mt-1 text-center" id = "titulo"> Login </h3>
        <div class = "mt-3 container rounded-0" id = "container-login">
            <form action= "login.php" method= "post" name = "form-login" onsubmit = "return validaSenha();"> 
            	<div class = "col-6 form-group mt-3 ml-3">
                    <label for = "siape"> SIAPE </label>
                    <input type="text" name="siape" class = "form-control input-sm" id = "siape">
                </div>
            	
	            <div class = "col-6 form-group ml-3">
                	<label for = "senha"> Senha </label> 
                	<input type = "password" name="senha" class = "form-control input-sm" id = "senha" >
            	</div>
	     
	            <div class="col-4 ml-3">
               		<button type = "submit" class = "mt-2 mb-3 col-12 btn btn-success"> Sign In</button>
               	</div>               	
            </form>
        </div>
   </div>
</body>

</html>';

?>