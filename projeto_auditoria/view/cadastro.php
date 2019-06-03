<?php
require_once("../model/Usuario.php");

$obj_usuario = new Usuario();
if(isset($_POST['siape']) and isset($_POST['senha']) and isset($_POST['nome']) and isset($_POST['cpf']) and isset($_POST['rsenha']) and isset($_POST['tipoUsuario'])) {
	$obj_usuario->setSiape($_POST['siape']);
	$obj_usuario->setSenha($_POST['senha']);
	$obj_usuario->setNome($_POST['nome']);
	$obj_usuario->setCpf($_POST['cpf']);

	if ($_POST['tipoUsuario'] != 'dirigente') {

		if ($_POST['tipoUsuario'] == 'auditorChefe') {
			$t = 2;
		}
		else if ($_POST['tipoUsuario'] == 'auditor') {
			$t=1;
		}
		$flag = $obj_usuario->efetuaCadastro($t,'');

		if($flag == true){
			header("Location: login.php");
		}

	}
	else {
		$t = 3;
		$flag = $obj_usuario->efetuaCadastro($t,$_POST['unidade']);
		if($flag == true){
			header("Location: login.php");
		}
	}
	
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
    <script type = "text/javascript" src="scriptCadastro.js"> </script>  
</head>

<body> 
    <div class = "container-fluid rounded-0">
        <h3 class = "mt-1 text-center" id = "titulo"> Cadastro </h3>
        <div class = "mt-3 container rounded-0" id = "container-cadastro">
            <form action="cadastro.php" method="post" name = "form-cadastro" onsubmit = "return validaSenha();"> 
            	<div class = "form-group mt-3">
                    <label for = "tipo"> Tipo de Usuário </label>
                    <select id="tipo" name="tipoUsuario" onChange= "conteudo();">
                    	<option value="default" id="default" selected="selected">Selecione</option>	
					  	<option value="auditor" id="auditor" name="Auditor">Auditor</option>
					  	<option value="auditorChefe" id="auditorChefe" name="auditorChefe">Auditor Chefe</option>
					  	<option value="dirigente" id="dirigente" name="dirigente">Dirigente</option>
					  	<option value="chefeNAM" id="chefeNAM" name="chefeNAM" >Chefe do NAM</option>
					</select>
                </div>
            	<div class = "row">
	            	<div class = "col-6 form-group">
	                    <label for = "nome"> Nome Completo</label> 
	                    <input type = "text" class = "form-control" id = "nome" name="nome">
	                </div>
	                <div class = "col-6 form-group">
                    	<label for = "siape"> SIAPE </label> 
                    	<input type = "text" class = "form-control" id = "siape" name="siape">
                	</div>
	            </div>
	            <div class = "row">
	                <div class = "col-6 form-group">
	                    <label for = "senha"> Senha </label>
	                    <input type = "password" class = "form-control" id = "senha" name="senha">
	                </div>
	                <div class = "col-6 form-group">
	                    <label for = "rsenha"> Repita a Senha </label>
	                    <input type = "password" class = "form-control" id = "rsenha" name="rsenha">
                	</div>
	            </div>
                <div class="row">
	                <div class = "col-6 form-group">
	                    <label for = "cpf"> CPF </label>
	                    <input type = "text" class = "form-control" id = "cpf" name="cpf">
	                </div>
	      			<div class = "col-6 form-group" id="dir-unidade">
	                    <label for = "unidade"> Unidade </label> <br>
             	        <input type = "text" class = "form-control" id = "unidade" name="unidade">
	                </div>	      
	            </div>
	            <div class="row">
	            	<div class="col-3">
               			<button type = "submit" class = "mt-2 mb-3 col-12 btn btn-success"> Sign Up </button>
               		</div>
               	</div>
            </form>
        </div>
   </div>
</body>

</html>';
?>
