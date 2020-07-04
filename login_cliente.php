
<html>

	<head>

		<meta charset = "UTF-8"/>
		<title> Pag login do cliente  </title>
		<link rel = "stylesheet" type = "text/css" href = "edit.css"/>

		<div class = "bar">
			<ul>
				<li><a class = id = "logo"         href = "index.php">CARTUCHO E CIA</a>
				<a id = "produtos"     href = "produtos.php">PRODUTOS</a>
				<a id = "cliente"      href = "login_cliente.php">CLIENTE</a>
				<a id = "fornecedor"   href = "login_funcionario.php">FUNCIONÁRIO</a>
				<a id = "atendimento"  href = "atendimento.php">ATENDIMENTO</a>
				<a id = "trabalhe_conosco"  href = "trabalhe_conosco.php">TRABALHE CONOSCO</a>
				<a id = "log_out" href = "logout.php" >LOGOUT</a></li>
			</ul>
		</div>

	</head>


	<body>

		<?php
			
			session_start();
			//Caso o usuário não esteja autenticado, limpa os dados e redireciona
			if ( !isset($_SESSION['usuario']) and !isset($_SESSION['senha']) ) {
				//Destrói
				session_destroy();
				#echo "<html>Olá visitante.</html>";
				
				//Limpa
				unset ($_SESSION['usuario']);
				unset ($_SESSION['senha']);
				
				//Redireciona para a página de autenticação
			}else{
				
				echo "<script> location.href = 'pagina_cliente.php'; </script>";
			}
		?>

		<div class = "form_cliente">
			<form  method = post action = "login.php">

					
				<input type = text name = cpf placeholder = "cpf">
				<BR>
				<BR>



					
				<input type = password name = senha placeholder = "senha">
				<BR>
				<BR>

					

				<input class = "button" type = reset value = "Limpar">
				
				<input class = "button" type = submit value = "Login">


			</form>
			

			<div class = "form_cliente2">
				<form   method = post action = "formulario_cadastro_cliente.php">

					<input class = "button" type = submit value = "Crie uma conta">


				</form>
			</div>

			
		</div>


	</body>


</html>