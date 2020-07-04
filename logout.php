<?php

	session_start();

	if(isset($_SESSION['usuario']) && isset($_SESSION['senha']))
		echo "<script> window.alert('Sessão finalizada!'); </script>";
		
	unset ($_SESSION['usuario']);
	unset ($_SESSION['senha']);

	session_destroy();
	
	echo "<script> location.href = 'index.php'; </script>";


		



?>
		
