<html>

	<head>
		<title> Formulario_atendimento  </title>
		<link rel = "stylesheet" type = "text/css" href = "edit.css"/>

	</head>


	<body>

	<?php



		function validar_form($nome, $telefone, $email, $mensagem){

			$erro = false;
			$temp = "<script> location.href = 'trabalhe_conosco.php'; </script>";
			$telefone = preg_replace('/[^0-9]/', '', (string) $telefone);

			if (empty($nome)){
				
				echo "<script> window.alert('Erro 00 - Campo nome vazio!'); </script>";
				echo $temp;

			}

			$telefone = preg_replace('/[^0-9]/', '', (string) $telefone);

			if (empty($telefone)){
				
				echo "<script> window.alert('Erro 01 - Campo telefone vazio!'); </script>"; 
				echo $temp;

			}

			if (strlen($telefone) < 8){
				
				echo "<script> window.alert('Erro 02 - Telefone incompleto!'); </script>";
				echo $temp;

			}

			if (empty($email)){
				
				echo "<script> window.alert('Erro 03 - Campo email incorreto!'); </script>";
				echo $temp;

			}
		
			if (strpos($email, '@') == false) {
    			echo "<script> window.alert('Erro 04 - Email invalido!'); </script>"; 
    			echo $temp;
			}	

			if (empty($mensagem)){

				echo $temp;

			}


			if ($erro){
				echo $email;
				echo $nome;
				echo $telefone;

				echo "<script> window.alert('Preencha novamente o formulário!'); </script>"; 
				echo $temp;
			}
			return true;


		}




		$nome      = $_POST["nome"];
		$telefone  = $_POST["telefone"];
		$email     = $_POST["email"];
		$mensagem  = "Ok";
		$retorno   = true;
		$form_page = "atendimento.html";

		$retorno   = validar_form($nome, $telefone, $email, $mensagem);

		if($retorno){

			echo '<script type="text/javascript">'; 
			echo 'alert("Formulário submetido!");'; 
			echo 'window.location.href = "index.php";';
			echo '</script>';		
				
		}else{
			echo '<script type="text/javascript">'; 
			echo 'window.location.href = "trabalhe_conosco.php";';
			echo '</script>';
		}
	?>

		




	



	</body>


</html>




