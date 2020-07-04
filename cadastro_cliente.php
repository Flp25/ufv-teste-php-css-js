<?php
	include 'classe.php';

	$obj = new Cliente();

	$form_page = "crud_func.php";
	$tabela_secundaria = "cliente";
	$pk = "cpf_cliente";
	$link = "<script> location.href='crud_func.php';</script>";
	$link2 = "<script> location.href = 'crud_func.php'; </script>";

	$obj->cadastro($form_page, $tabela_secundaria, $pk, $link, $link2);


?>