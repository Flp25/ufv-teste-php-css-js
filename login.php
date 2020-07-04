<?php
	include 'classe.php';

	$tabela  = "pessoa";
	$tabela2 = "cliente";
	$on = "`cpf_cliente`";
	$link = "<script> location.href='pagina_cliente.php'</script>";
	$link2 = "<script> location.href = 'login_cliente.php'; </script>";

	$obj = new Cliente();
	$obj->logar_usuario($tabela, $tabela2, $on, $link, $link2);


?>