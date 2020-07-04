<?php
	include 'classe.php';

	$obj = new Servico();

	$servico = "servico";
	$tabela_secundaria = " ";
	$pk = " ";
	$link = "<script> location.href='crud_servico.php'</script>";
	$link2 = "<script> location.href = 'crud_func.php'; </script>";
	$id = " ";

	$obj->registrar_orcamento($link, $link2);


?>