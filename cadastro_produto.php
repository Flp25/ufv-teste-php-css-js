<?php
	include 'classe.php';

	$obj = new Produto();

	$produto = "produto";
	$fornecedor = "fornecedor";
	$pk = "cnpj_fornecedor";
	$link = "<script> location.href='crud_produto.php';</script>";
	$link2 = "<script> location.href = 'crud_produto.php'; </script>";

	$obj->cadastro_produto($produto, $fornecedor, $pk, $link, $link2);


?>