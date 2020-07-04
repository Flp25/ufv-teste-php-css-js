<?php
	include 'classe.php';

	$obj = new Servico();

	$servico = "servico";
	$tabela_secundaria = " ";
	$pk = " ";
	$link = "<script> location.href='relatorio.php'</script>";
	$link2 = "<script> location.href = 'relatorio.php'; </script>";
	$id = " ";

	$obj->balanco($servico, $link, $link2);


?>