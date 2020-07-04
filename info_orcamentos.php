<?php
	include 'classe.php';

	$obj = new Cliente();

	$servico = " ";
	$tabela_secundaria = " ";
	$pk = " ";
	$link = "<script> location.href='pagina_cliente.php'</script>";
	$link2 = "<script> location.href = 'pesquisa_servico.php'; </script>";
	$id = " ";

	$obj->info_orcamentos($link);


?>