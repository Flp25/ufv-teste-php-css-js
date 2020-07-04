<html>

	<head>
	
		<title> Formulario_cliente  </title>
		<link rel = "stylesheet" type = "text/css" href = "edit.css"/>
	</head>


	<body>

	<?php



		function validar_form_cliente($cpf, $senha, $nome, $endereco, $email, $datanascimento){

			$erro = false;

			if (empty($cpf)){
				
				echo "ERROx00 - Campo [CPF] vazio. <br>";
				$erro = true;

			}

			$cpf = preg_replace('/[^0-9]/', '', (string) $cpf);

			if (empty($senha)){
				
				echo "ERROx01 - Campo [Senha] vazio. <br>";
				$erro = true;

			}
			
			if(strlen($senha) < 5){
				
				echo "ERROx04 - Senha insuficiente. <br>";
				$erro = true;

			}
					
			$cpf = preg_replace('/[^0-9]/', '', (string) $cpf);

	
			if (strlen($cpf) < 11){
				
				echo "ERROx02 - [CPF] possui apenas ".strlen($cpf)."/11 caracteres. <br>";
				$erro = true;

			}else if (strlen($cpf) > 11){
				
				echo "ERROx03 - [CPF] contém ".strlen($cpf)."/11 caracteres. <br>";
				$erro = true;

			}

			if($erro)
				return false;
			
			return true;


		}



		include 'db.php';

		$cpf_cliente  = $_POST["cpf"];
		$senha = $_POST["senha"];
		$nome = $_POST["nome"];
		$endereco = $_POST["endereco"];
		$email = $_POST["email"];
		$datanascimento = $_POST["datanascimento"];

		$retorno = true;
		$form_page = "login_cliente.html";
		$connect = db_connect();



		$retorno = validar_form_cliente($cpf_cliente, $senha, $nome, $endereco, $email, $datanascimento);

		if(!$retorno)	
			echo "<br>Preencha novamente os campos.<br>";

		else{


			$sql = "INSERT INTO `cliente` (`cpf`, `nome`, `senha`, `endereco`, `email`, `datanascimento`) VALUES ($cpf_cliente, $nome, $senha, $endereco, $email, $datanascimento)";

		
			$connect->query($sql);

			mysqli_close($connect);




		}			
		echo "<a href='".$form_page."'>Voltar</a> <br>";
		

	?>

		




	



	</body>
</html>