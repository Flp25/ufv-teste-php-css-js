<?php
	include 'classe.php';

	$obj = new Servico();

	$tabela = "servico";
	$tabela_secundaria = " ";
	$fk = " ";
	$link = "<script> location.href='crud_servico.php'</script>";
	$link2 = "<script> location.href = 'crud_servico.php'; </script>";
	$id = " ";
	$action = " ";

	$obj->deletar_servico($tabela, $tabela_secundaria, $fk, $link, $link2, $id, $action);


?>