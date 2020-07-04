<?php
	include 'classe.php';

	$obj = new Cliente();

	$tabela = "pessoa";
	$tabela_secundaria = "cliente";
	$pk = "cpf_cliente";
	$link = "<script> location.href='pagina_cliente.php'</script>";
	$link2 = "<script> location.href = 'pagina_cliente.php'; </script>";
	$id = "idcliente";
	$action = "update_pagina_cliente.php";

	$obj->pesquisa($tabela, $tabela_secundaria, $pk, $link, $link2, $id, $action);


?>