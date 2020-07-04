<?php
	include 'classe.php';

	$obj = new Cliente();

	$form_page = "login_cliente.html";
	$tabela_secundaria = "cliente";
	$pk = "cpf_cliente";
	$link = "<script> location.href='index.php'</script>";
	$link2 = "<script> location.href = 'login_cliente.php'; </script>";

	$obj->cadastro($form_page, $tabela_secundaria, $pk, $link, $link2);


?>