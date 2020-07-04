<?php
	include 'classe.php';

	$obj = new Servico();

	$produto = " ";
	$fornecedor = " ";
	$pk = " ";
	$link = "<script> location.href='crud_servico.php';</script>";
	$link2 = "<script> location.href = 'crud_servico.php'; </script>";

	$obj->cadastro_servico($produto, $fornecedor, $pk, $link, $link2);


?>