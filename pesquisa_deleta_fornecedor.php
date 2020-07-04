<?php
	include 'classe.php';

	$obj = new Fornecedor();

	$tabela = "fornecedor";
	$tabela_secundaria = " ";
	$pk = " ";
	$link = "<script> location.href='remove.php'</script>";
	$link2 = "<script> location.href = 'remove.php'; </script>";
	$id = " ";
	$action = "deletar_fornecedor.php";

	if($_POST["cnpj"] == ''){
		echo "<script> window.alert('Informe o CNPJ'); </script>";
		echo $link2;		
	}

	$obj->remover_fornecedor($tabela, $tabela_secundaria, $pk, $link, $link2, $id, $action);


?>