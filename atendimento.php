<html>

	<head>
		<meta charset="utf-8"></meta>
		<title> Atendimento  </title>
		<link rel = "stylesheet" type = "text/css" href = "edit.css"/>

		<div class = "bar">
			<ul>
				<li><a class = id = "logo"         href = "index.php">CARTUCHO E CIA</a>
				<a id = "produtos"     href = "produtos.php">PRODUTOS</a>
				<a id = "cliente"      href = "login_cliente.php">CLIENTE</a>
				<?php
					session_start();
					$print = "";
					if(isset($_SESSION['usuario']) && isset($_SESSION['senha']) && $_SESSION['nome'] == "funcionario"){
						$print = "<a id = 'fornecedor'  href = 'login_funcionario.php'>FUNCIONÁRIO</a>";
					}else if (!isset($_SESSION['usuario']) && !isset($_SESSION['senha'])){
						$print = "<a id = 'fornecedor'  href = 'login_funcionario.php'>FUNCIONÁRIO</a>";
					}
					echo $print;

						
				?>
				<a id = "atendimento"  href = "atendimento.php">ATENDIMENTO</a>
				<a id = "trabalhe_conosco"  href = "trabalhe_conosco.php">TRABALHE CONOSCO</a>
				<a id = "log_out" href = "logout.php" >LOGOUT</a></li>
			</ul>
		</div>

		
	</head>


	<body>



		
		<div class = "form_cliente1">
		<p style = "font-family: tech; color: white; font-size: 20px;">Formulário de atendimento</p>
			<form  method = post action = "vrf_form_atendimento.php">



				
				<input type = text name = nome placeholder = "nome">
				<BR>
				<BR>

				<input type = text name = telefone placeholder = "telefone">
				<BR>
				<BR>

				<input type = text name = email placeholder = "email">
				<BR>
				<BR>			

				<textarea name = mensagem row = "25" columns = "100" placeholder = "Escreva aqui sua solicitação."></textarea>
				<br>
				<br>

				<input class = "button" type = reset value = "Limpar">
				<input class = "button" type = submit value = "Enviar">


			</form>
			<br><br><br><br><br><br><br>
			<div class = "lefthint" style = "bottom: -50px">
				<p> Para entrar em contato conosco utilize este formulário. <br> O Campo de mensagem possui um tamanho ajustável.</p>
			</div>			
		</div>



	</body>


</html>