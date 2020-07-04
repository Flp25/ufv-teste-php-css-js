

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
			//Caso o usuário não esteja autenticado, limpa os dados e whiteireciona
			if ( !isset($_SESSION['cpf']) and !isset($_SESSION['senha']) ) {
				//Destrói
				session_destroy();
				echo "<html>Olá visitante.</html>";
				//Limpa
				unset ($_SESSION['cpf']);
				unset ($_SESSION['senha']);
				
				//whiteireciona para a página de autenticação
			}


		?>
		<div class = "crud">		
				<form   class = "lcrud" method = post accept-charset="UTF-8" action = "pesquisa_crud.php">
					<p style = "font-family: tech; color: white; font-size: 20px;">Buscar cliente</p>
						
					<input type = text name = cpf  placeholder = "CPF">

					<BR>
					<BR>
					<input class = "button" type = reset value = "Limpar">
					<BR><BR>
					<input class = "button" type = submit value = "Pesquisar">



				</form>
				<form   class = "ccrud" method = post accept-charset="UTF-8" action = "pesquisa_funcionario.php">
					<p style = "font-family: tech; color: white; font-size: 20px;">Buscar funcionário</p>
						
					<input type = text name = cpf  placeholder = "CPF">

					<BR>
					<BR>
					<input class = "button" type = reset value = "Limpar">
					<BR>
					<BR>
					<input class = "button" type = submit value = "Pesquisar">



				</form>
				<form   class = "rcrud" method = post accept-charset="UTF-8" action = "pesquisa_fornecedor.php">
					<p style = "font-family: tech; color: white; font-size: 20px;">Buscar fornecedor</p>
						
					<input type = text name = cnpj  placeholder = "CNPJ">
						

					<BR>
					<BR>
					<input class = "button" type = reset value = "Limpar">
					<BR>
					<BR>
					<input class = "button" type = submit value = "Pesquisar">



				</form>
		</div>

		




	</body>
</html>

