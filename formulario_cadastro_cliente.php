<html>

	
	<head>
		<meta charset="utf-8"></meta>
		<title> Criar uma conta_cliente  </title>
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
		?>
		

			
				 <div class = "cadastro" style = "height: 500px; text-align:center;">
					<form   class = "cadastro_cliente" method = post accept-charset="UTF-8" action = "cadastro.php">
						<p style = "font-family: tech; color: white; font-size: 20px;">Preencha o formulário de cadastro</p>
						
						<input type = text name = cpf  placeholder = "CPF">
						
		


							
						<input type = text name = senha placeholder = "Senha numérica">
						


							
						<input type = text name = nome accept-charset="UTF-8" placeholder = "Nome">
						<input type = text name = datanascimento placeholder = "Nascimento AAMMDD">
						



						<p style = "font-family: tech; color: white; font-size: 14px;">Endereço</p>
						<input type = text name = enderecoI accept-charset="UTF-8" placeholder = "Rua, Avenida">
						<input type = text name = enderecoII accept-charset="UTF-8" placeholder = "Número">
						<input type = text name = enderecoIII accept-charset="UTF-8" placeholder = "Bairro">
						<input type = text name = enderecoIV accept-charset="UTF-8" placeholder = "Cidade">

						<BR>
		

						<p style = "font-family: tech; color: white; font-size: 14px;">Contato</p>	
						<input type = text name = email placeholder = "Email" >
						<input type = text name = telefone placeholder = "Telefone 00000000">
						<BR>
						<BR>
						


						<input class = "button" type = reset value = "reset">
						
						<input class = "button" type = submit value = "send">



					</form>
					<div class = "lefthint">
						<p >Para criar um novo perfil no nosso site basta preencher este formulário com os seus dados pessoais.<br>
						CPF e Data de nascimento devem ser preenchidos apenas com números.</p>
					</div>
				</div>

	</body>


</html>