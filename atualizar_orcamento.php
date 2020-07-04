<?php
	include 'classe.php';

	$obj = new Servico();

	$servico = "servico";
	$tabela_secundaria = " ";
	$pk = " ";
	$link = "<script> location.href='crud_servico.php'</script>";
	$link2 = "<script> location.href = 'crud_func.php'; </script>";
	$id = " ";
	#idsolicitacao

	if($_POST["idsolicitacao"] == ''){
		echo "<script> window.alert('Informe o ID do orçamento'); </script>";
		echo $link;		
	}

	$obj->atualizar_orcamento($link);


?>