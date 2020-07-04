<html>

	<head>
		<title> Trabalhe conosco </title>
		<meta charset = "UTF-8"/>
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
		
		<div class = "form_cliente1">
		<p style = "font-family: tech; color: white; font-size: 20px;">Trabalhe conosco</p>
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

				<input type = reset value = "reset">
				<input type = submit value = "send">


			</form>
			<div class = "lefthint">
				<p>Para entrar em contato conosco utilize este formulário. </p>
			</div>			
		</div>



	</body>


</html>