<?php

	
	
	function db_connect(){

		$host = "localhost";
		$user = "root";
		$pw   = "";
		$dbname = "papelaria";
		$connect = mysqli_connect($host, $user, $pw, $dbname) 
			or die ("ERRO AO CONECTAR");


		mysqli_query($connect, "SET NAMES 'utf8'");

		mysqli_query($connect, 'SET character_set_connection=utf8');

		mysqli_query($connect, 'SET character_set_client=utf8');

		mysqli_query($connect, 'SET character_set_results=utf8');

		if(!$connect->connect_error){
			#echo "<script> window.alert('Banco conectado!'); </script>";
		}

		return $connect;

	}

	function db_disconnect($connect){
		
		#echo "<script> window.alert('Banco desconectado!'); </script>";
		mysqli_close($connect);


	}

	function db_select($sql){
		
		
			
	
			$connect = db_connect();		
			$busca = mysqli_query($connect, $sql);
			db_disconnect($connect);
			
			if(mysqli_num_rows($busca) == 1)
				return true;
			else{
				return false;
			
			}

	}

	function db_select_list($sql){
		
		
			
	
			$connect = db_connect();		
			$busca = mysqli_query($connect, $sql);
			db_disconnect($connect);
			
			if(mysqli_num_rows($busca) > 0)
				return true;
			else{
				return false;
			
			}

	}

	function db_update($sql){
		
			$connect = db_connect();		
			$busca = mysqli_query($connect, $sql);

			db_disconnect($connect);
			return $busca;


	}

	function db_delete($sql){
		
			$connect = db_connect();		
			$busca = mysqli_query($connect, $sql);

			db_disconnect($connect);
			return $busca;

	}

	function db_insert_tabela_secundaria($sql){
		
		$connect = db_connect();
		$insert = mysqli_query($connect, $sql);
		db_disconnect($connect);
		return $insert;

	}
	function db_insert($sql){
		
		$connect = db_connect();
		$insert  = mysqli_query($connect, $sql);
		db_disconnect($connect);
		return $insert;



	}


?>