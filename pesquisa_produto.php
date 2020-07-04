<?php
	include 'classe.php';

	$obj = new Produto();

	$produto = "produto";
	#$tabela_secundaria = " ";
	#$pk = " ";
	$link = "<script> location.href='crud_produto.php'</script>";
	$link2 = "<script> location.href = 'crud_produto.php'; </script>";
	#$id = " ";

	if($_POST["idproduto"] == ''){
		echo "<script> window.alert('Informe o ID do produto'); </script>";
		echo $link2;		
	}
	$obj->pesquisa_produto($produto, $link);


?>