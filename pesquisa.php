<?php
	include 'classe.php';

	$obj = new Cliente();


	$tabela = "pessoa";
	$tabela_secundaria = "cliente";
	$pk = "cpf_cliente";
	$link = "<script> location.href='atualizar.php'</script>";
	$link2 = "<script> location.href = 'pagina_cliente.php'; </script>";
	$id = "idcliente";
	$action = "update.php";
	
	if(!isset($_POST["cpf"])){
		echo "<script> window.alert('Informe o CPF'); </script>";
		echo $link2;		
	}
	$obj->pesquisa($tabela, $tabela_secundaria, $pk, $link, $link2, $id, $action);


?>