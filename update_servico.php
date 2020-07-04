<?php
	include 'classe.php';

	$obj = new Servico();

	$servico = "servico";
	$tabela_secundaria = " ";
	$pk = " ";
	$link = "<script> location.href='crud_servico.php'</script>";
	$link2 = "<script> location.href = 'pesquisa_servico.php'; </script>";
	$id = " ";

	$obj->atualizar_dados_servico($servico, $link, $link2);


?>