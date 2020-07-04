

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
				<a id = "log_out" href = "logout_func.php" >PRODUTOS</a></li>
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
				<form   class = "lcrud" method = post accept-charset="UTF-8" enctype="multipart/form-data" action = "cadastro_produto.php">
					<p style = "font-family: tech; color: white; font-size: 20px;">Cadastrar produto</p>
						
					<input type = text name = idproduto  placeholder = "ID produto ex: 100">
					<BR><BR>
					<input type = text name = estoque placeholder = "Estoque ex: 1000" >
					<BR><BR>
					<input type = text name = cnpj placeholder = "CNPJ Fornecedor">
					<BR><BR>
					<input type = text name = preco placeholder = "Preço limite: R$ 999,99" >
					<BR><BR>
					<input type = text name = nome accept-charset="UTF-8" placeholder = "Nome do produto" >
					<BR><BR>
					<textarea name = descricao row = "25" columns = "100" placeholder = "Descrição do produto."></textarea>
					<BR><BR>	

					<input  name="arquivo" type="file" >
					<BR>
					<BR>

					<input class = "button" type = reset value = "Limpar">
					<BR><BR>
					<input class = "button" type = submit value = "Cadastrar">



				</form>
				<form   class = "ccrud" method = post accept-charset="UTF-8" action = "pesquisa_produto.php">
					<p style = "font-family: tech; color: white; font-size: 20px;">Atualizar produto</p>
						
					<input type = text name = idproduto  placeholder = "ID produto">

					<BR>
					<BR>
					<input class = "button" type = reset value = "Limpar">
					<BR>
					<BR>
					<input class = "button" type = submit value = "Pesquisar">



				</form>
				<form   class = "rcrud" method = post accept-charset="UTF-8" action = "pesquisa_deleta_produto.php">
					<p style = "font-family: tech; color: white; font-size: 20px;">Remover produto</p>
						
					<input type = text name = idproduto  placeholder = "ID produto">
						

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

