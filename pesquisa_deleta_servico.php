<?php
	include 'classe.php';

	$obj = new Servico();

	$tabela = "servico";
	$tabela_secundaria = " ";
	$fk = " ";
	$link = "<script> location.href='crud_servico.php'</script>";
	$link2 = "<script> location.href = 'crud_servico.php'; </script>";
	$id = " ";
	$action = "deletar_servico.php";

	if($_POST["idservico"] == ''){
		echo "<script> window.alert('Informe o ID do serviço'); </script>";
		echo $link2;		
	}

	$obj->remover_servico($tabela, $tabela_secundaria, $fk, $link, $link2, $id, $action);


?>