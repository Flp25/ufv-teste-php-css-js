<?php
	include 'classe.php';

	$obj = new Fornecedor();

	$tabela = "fornecedor";
	$tabela_secundaria = "produto";
	$pk = "cnpj_fornecedor";
	$link = "<script> location.href='remove.php'</script>";
	$link2 = "<script> location.href = 'remove.php'; </script>";
	$id = " ";
	

	$obj->deletar_fornecedor($tabela, $tabela_secundaria, $pk, $link, $link2, $id);


?>