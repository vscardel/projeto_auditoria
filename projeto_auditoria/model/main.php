<?php

	require_once("Usuario.php");
	require_once("Auditor.php");
	require_once("Dirigente.php");

	$obj = new Usuario();
	$obj->setSiape("000001");
	$obj->setCpf("03132151034");
	$obj->setNome("MANOELL DE SOUSA DUARTE NETO");
	$obj->setSenha("401643");


	// $bla = "Instituto de Física";
	// if($obj->efetuaCadastro(2,'Insituto de Física')){
	// 	echo "cadastro efetuado com sucesso <br>";
	// }
	// else{
	// 	echo "Usuario ja existe no sistema <br>";
	// }

	$obj->recuperaOrdenado('A');

	// $obj->deletaUsuario(2);

	// $obj2 = new Dirigente();
	// $obj2->setSiape('7721154');
	// // $obj2->armazenaResposta('3642699','2019-06-28 00:00:00',1,'sadadasds','0000000');

	// $obj2->recuperaRespostas();

	// // if($obj->efetuaLogin()){
	// // 	echo "login porra <br>";
	// }
	// else{
	// 	echo "tome no seu cu <br>";
	// }


	// if($obj->alteraCadastro('','123213')){
	// 	echo "Cadastro alterado <br>";
	// }
	// else{
	// 	echo "se deu mal haha <br>";
	// }

	// $obj2 = new Dirigente();
	// $obj2->setSiape('123456');
	// if($obj2->armazenaResposta('123456','04/04/04::32:22:22',2,'dsadsadasdsasac','000000')){
	// 	echo "consegui <br>";
	// }
	// else{
	// 	echo "nao :( <br>";
	// }
	// $bla = $obj2->recuperaRespostas();
	// var_dump($bla);

?>