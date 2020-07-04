<?php
	include 'classe.php';

	$obj = new Fornecedor();

	$tabela = "fornecedor";
	$tabela_secundaria = "fornecedor";
	$pk = "cnpj";
	$link = "<script> location.href='atualizar.php'</script>";
	$link2 = "<script> location.href = 'atualizar.php'; </script>";
	$id = "cnpj";

	$obj->atualizar_dados_fornecedor($tabela, $tabela_secundaria, $pk, $link, $link2, $id);


?>