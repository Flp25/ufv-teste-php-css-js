<?php
	include 'classe.php';

	$obj = new Produto();

	$tabela = "produto";
	$tabela_secundaria = "fornecedor";
	$fk = "cnpj_fornecedor";
	$link = "<script> location.href='crud_produto.php'</script>";
	$link2 = "<script> location.href = 'crud_produto.php'; </script>";
	$id = "idproduto";
	$action = "deletar_produto.php";

	$obj->deletar_produto($tabela, $tabela_secundaria, $fk, $link, $link2, $id, $action);


?>