<?php

	function db_connect(){

		$host = "localhost";
		$user = "root";
		$pw   = "";
		$dbname = "projeto";
		$connect = new mysqli($host, $user, $pw, $dbname) 
			or die ("ERRO AO CONECTAR");

		if($connect->connect_error == TRUE)
			echo "ERR";

		return $connect;

	}

	function db_disconnect($connect){
		
		echo"ok3";
		mysqli_close($connect);


	}

?>