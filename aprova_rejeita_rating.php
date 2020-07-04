<?php
	include 'classe.php';

	$obj = new Servico();

	$servico = "servico";
	#$tabela_secundaria = " ";
	#$pk = " ";
	$link = "<script> location.href='pagina_cliente.php'</script>";
	$link2 = "<script> location.href = 'pagina_cliente.php'; </script>";
	#$id = " ";

	$obj->aprova_rejeita_rating($servico, $link);


?>