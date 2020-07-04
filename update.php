<?php
	include 'classe.php';

	$obj = new Cliente();

	$tabela = "pessoa";
	$tabela_secundaria = "cliente";
	$pk = "cpf_cliente";
	$link = "<script> location.href='atualizar.php'</script>";
	$link2 = "<script> location.href = 'atualizar.php'; </script>";
	$id = "idcliente";

	$obj->atualizar_dados($tabela, $tabela_secundaria, $pk, $link, $link2, $id);


?>