<?php
	include 'classe.php';

	$obj = new Produto();

	$produto = "produto";
	$tabela_secundaria = "fornecedor";
	$pk = " o";
	$link = "<script> location.href='crud_produto.php'</script>";
	$link2 = "<script> location.href = 'pesquisa_produto.php'; </script>";
	$id = " ";

	$obj->atualizar_dados_produto($produto, $link, $tabela_secundaria, $link2);


?>