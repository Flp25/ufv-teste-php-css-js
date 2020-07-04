<?php
	include 'classe.php';

	$obj = new Fornecedor();


	$link = "<script> location.href = 'crud_func.php'; </script>";
	$link2 = "<script> location.href = 'crud_func.php'; </script>";

	$obj->cadastro_fornecedor($link2);


?>