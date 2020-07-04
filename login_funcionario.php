<html>
	<head>
		<title> Funcionarios  </title>
		<link rel = "stylesheet" type = "text/css" href = "edit.css"/>
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

		
		<text style = "color:white">Caso a sessão do cliente esteja ativa esse link permanecerá invisível na barra acima.</text>
		
		<div class = "cadastro" style = "left: 450px">
			<p style = "font-family: tech; color: white; font-size: 20px;">Acesso restrito</p><BR>
			<form  method = post action = "login_func.php">

				
				<input type = text name = cpf placeholder = "cpf">
				<BR>
				<BR><BR>

				
				<input type = password name = senha placeholder = "senha numérica">
				<BR>
				<BR>		
				<BR>		

				<input class = "button" type = reset value = "Limpar">
				<BR><BR>
				<input class = "button" type = submit value = "Login">


			</form>
		</div>

	</body>


</html>