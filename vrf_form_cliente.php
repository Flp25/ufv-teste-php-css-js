<html>

	<head>
		<title> Formulario_cliente  </title>
		<link rel = "stylesheet" type = "text/css" href = "edit.css"/>

	</head>


	<body>

	<?php



		function validar_form_cliente($cpf, $senha){

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
			
			if(strlen($senha) < 0){
				
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
		$retorno = true;
		$form_page = "login_cliente.html";


		$retorno = validar_form_cliente($cpf_cliente, $senha);

		$connect = db_connect();


		if(!$retorno)	
				echo "<a href='".$form_page."'>Preencha novamente os campos</a> <br>";
		else{

			$sql = "SELECT `cpf`, `senha`, `nome` FROM `cliente` WHERE `cpf` = $cpf_cliente and `senha` = $senha";

					
			$result = $connect->query($sql);

			if(mysqli_num_rows($result) == 0){
				
				echo "<a href='".$form_page."'>Login incorreto ou inexistente</a> <br>";

			}else{



			mysqli_close($connect);

			session_start();
			$_SESSION['cpf'] = $cpf_cliente;
			$_SESSION['nome'] = " fecth ";



			
			}
		}

		

	?>

		




	



	</body>


</html>




