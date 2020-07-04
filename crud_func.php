

<!DOCTYPE html>
<html>

<style>
</style>


	<head>

		<meta charset = "UTF-8"/>
		<title> Homepage </title>
		<link rel = "stylesheet" type = "text/css" href = "edit.css"/>
		<div class = "bar" style = "font-family:arial; font-size: 16px;">
			<ul>
				<li><a class = id = "logo"         href = "logout_func.php">LOG OUT</a>
				<a id = "produtos"     href = "crud_func.php">CADASTRAR PERFIL</a>
				<a id = "cliente"      href = "atualizar.php">ATUALIZAR PERFIL</a>
				<a id = "fornecedor"   href = "remove.php">REMOVER PERFIL</a>
				<a id = "atendimento"  href = "relatorio.php">RELATÓRIOS</a>
				<a id = "trabalhe_conosco"  href = "crud_servico.php">SERVIÇOS</a>
				<a id = "log_out" href = "crud_produto.php" >PRODUTOS</a></li>
			</ul>
		</div>
		
		<?php include 'db.php' ?>



	</head>



	<body>



		<?php
			
			session_start();
			//Caso o usuário não esteja autenticado, limpa os dados e redireciona
			if ( !isset($_SESSION['cpf']) and !isset($_SESSION['senha']) ) {
				//Destrói
				session_destroy();
				echo "<html>Olá visitante.</html>";
				//Limpa
				unset ($_SESSION['cpf']);
				unset ($_SESSION['senha']);
				
				//Redireciona para a página de autenticação
			}


		?>
		<div class = "crud">		
				<form   class = "lcrud" method = post accept-charset="UTF-8" action = "cadastro_cliente.php">
					<p style = "font-family: tech; color: white; font-size: 20px;">Cadastro de clientes</p>
						
					<input type = text name = cpf  placeholder = "CPF">
					<input type = text name = senha placeholder = "Senha numérica" >
						
					<input type = text name = nome accept-charset="UTF-8" placeholder = "Nome" >
					<input type = text name = datanascimento placeholder = "Nascimento AAMMDD" >
						
					<p style = "font-family: tech; color: white; font-size: 14px;">Endereço</p>
					<input type = text name = enderecoI accept-charset="UTF-8" placeholder = "Rua, Avenida" >
					<input type = text name = enderecoII accept-charset="UTF-8" placeholder = "Número" >
					<input type = text name = enderecoIII accept-charset="UTF-8" placeholder = "Bairro" >
					<input type = text name = enderecoIV accept-charset="UTF-8" placeholder = "Cidade" >
					<BR>
		

					<p style = "font-family: tech; color: white; font-size: 14px;">Contato</p>	
					<input type = text name = email placeholder = "Email" >
					<input type = text name = telefone placeholder = "Telefone 00000000" >
					<BR>
					<BR>
					<input class = "button" type = reset value = "Limpar">
					<input class = "button" type = submit value = "Cadastrar">



				</form>
				<form   class = "ccrud" method = post accept-charset="UTF-8" action = "cadastro_func.php">
					<p style = "font-family: tech; color: white; font-size: 20px;">Cadastro de funcionários</p>
						
					<input type = text name = cpf  placeholder = "CPF">
					<input type = text name = senha placeholder = "Senha numérica" >
						
					<input type = text name = nome accept-charset="UTF-8" placeholder = "Nome" >
					<input type = text name = datanascimento placeholder = "Nascimento AAMMDD" >
						
					<p style = "font-family: tech; color: white; font-size: 14px;">Endereço</p>
					<input type = text name = enderecoI accept-charset="UTF-8" placeholder = "Rua, Avenida" >
					<input type = text name = enderecoII accept-charset="UTF-8" placeholder = "Número" >
					<input type = text name = enderecoIII accept-charset="UTF-8" placeholder = "Bairro" >
					<input type = text name = enderecoIV accept-charset="UTF-8" placeholder = "Cidade" >
					<BR>
		

					<p style = "font-family: tech; color: white; font-size: 14px;">Contato</p>	
					<input type = text name = email placeholder = "Email" >
					<input type = text name = telefone placeholder = "Telefone 00000000" >
					<BR>
					<BR>
					<input class = "button" type = reset value = "Limpar">
					<input class = "button" type = submit value = "Cadastrar">



				</form>
				<form   class = "rcrud" method = post accept-charset="UTF-8" action = "cadastro_fornecedor.php">
					<p style = "font-family: tech; color: white; font-size: 20px;">Cadastro de fornecedores</p>
						
					<input type = text name = cnpj  placeholder = "CNPJ">
						
					<input type = text name = nome accept-charset="UTF-8" placeholder = "Nome" >
					<BR>
		

					<p style = "font-family: tech; color: white; font-size: 14px;">Contato</p>	
					<input type = text name = email placeholder = "Email" >
					<input type = text name = telefone placeholder = "Telefone 00000000" >
					<BR>
					<BR>
					<input class = "button" type = reset value = "Limpar">
					<input class = "button" type = submit value = "Cadastrar">



				</form>
		</div>

		




	</body>
</html>

