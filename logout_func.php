<?php

	session_start();

	unset ($_SESSION['usuario']);
	unset ($_SESSION['senha']);

	session_destroy();
	
	echo "<script> location.href = 'login_funcionario.php'; </script>";


		



?>
		
