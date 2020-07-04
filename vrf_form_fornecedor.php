<html>

	<head>
		<title> Formulario_empresa  </title>
		<link rel = "stylesheet" type = "text/css" href = "edit.css"/>

	</head>


	<body>

	<?php



		function validar_form($cnpj, $senha){

			$erro = false;

			if (empty($cnpj)){
				
				echo "ERROx00 - Campo [CNPJ] vazio. <br>";
				$erro = true;

			}

			$cnpj = preg_replace('/[^0-9]/', '', (string) $cnpj);

			if (empty($senha)){
				
				echo "ERROx01 - Campo [Senha] vazio. <br>";
				$erro = true;

			}
			
			if (strlen($senha) < 5){
				
				echo "ERROx04 - Senha insuficiente. <br>";
				$erro = true;

			}
					

	
			if (strlen($cnpj) < 11){
				
				echo "ERROx02 - [CNPJ] possui apenas ".strlen($cnpj)."/11 caracteres. <br>";
				$erro = true;

			}else if (strlen($cnpj) > 11){
				
				echo "ERROx03 - [CNPJ] contém ".strlen($cnpj)."/11 caracteres. <br>";
				$erro = true;

			}

			if ($erro)
				return false;
			
			return true;


		}




		$cnpj      = $_POST["cnpj"];
		$senha     = $_POST["senha"];
		$retorno   = true;
		$form_page = "login_fornecedor.html";

		$retorno = validar_form($cnpj, $senha);

		if(!$retorno){
			echo "<a href='".$form_page."'>Preencha novamente os campos</a> <br>";
		}else{

			$sql = "SELECT `cnpj`, `senha`, `nome` FROM `forncedor` WHERE `cnpj` = $cnpj and `senha` = $senha";

					
			$result = $connect->query($sql);

			if(mysqli_num_rows($result) == 0){
				
				echo "<a href='".$form_page."'>Login inexistente</a> <br>";

			}else{
				
				setcookie("nome_login", $cpf_cliente);
				setcookie("senha_login", $senha);
				header("Location: index.html");
			}

			mysqli_close($connect);

			session_start();
			$_SESSION['cpf'] = $cpf_cliente;
			$_SESSION['nome'] = " fecth ";



			
			}

	?>

		




	



	</body>


</html>




