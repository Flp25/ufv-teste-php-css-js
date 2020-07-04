<?php
	include 'classe.php';

	$obj = new Fornecedor();

	$tabela = "fornecedor";
	$tabela_secundaria = "fornecedor";
	$pk = "cnpj";
	$link = "<script> location.href='atualizar.php'</script>";
	$link2 = "<script> location.href = 'atualizar.php'; </script>";
	$action = "update_fornecedor.php";

	if($_POST["cnpj"] == ''){
		echo "<script> window.alert('Informe o CNPJ'); </script>";
		echo $link2;		
	}

	$obj->pesquisa_fornecedor($tabela, $tabela_secundaria, $pk, $link, $link2, $action);


?>