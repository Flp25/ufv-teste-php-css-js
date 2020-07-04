<?php
	include 'classe.php';

	$obj = new Servico();

	$servico = "servico";
	$tabela_secundaria = " ";
	$pk = " ";
	$link = "<script> location.href='crud_servico.php'</script>";
	$link2 = "<script> location.href = 'crud_servico.php'; </script>";
	$id = " ";

	if($_POST["idservico"] == ''){
		echo "<script> window.alert('Informe o ID do serviço'); </script>";
		echo $link2;		
	}

	$obj->orcamento_servico($link);


?>