

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
				<form  style = "left:25%;" class = "lcrud" method = post accept-charset="UTF-8" enctype="multipart/form-data" action = "financeiro.php">
					<p style = "font-family: tech; color: white; font-size: 20px;">Controle Financeiro</p>
						
					<select name = tipo>
						<option value = "Despesa">Despesa</option>
						<option value = "Lucro">Lucro</option>
					</select>
					<BR><BR>
					<select name = categoria>
						<option value = "Produto">Produto</option>
						<option value = "Servico">Serviço</option>
						<option value = "Outros">Outros</option>
					</select>
					<?php echo "<input type = hidden name = idfuncionario  placeholder = 'idfuncionario' value = ".$_SESSION['usuario'].">"?>
					
					<BR><BR>
					<input type = text name = valor placeholder = "Preço limite: R$ 999,99" >
					<BR><BR><BR>
					<textarea name = descricao row = "25" columns = "100" placeholder = "Observação"></textarea>
					<BR><BR>	



					<input class = "button" type = reset value = "Limpar">
					<BR><BR>
					<input class = "button" type = submit value = "Cadastrar">




				</form>
				
				<form style = "position:absolute;left:30.5%;bottom: 120px;"method = post action = "balanco.php">
					<input class = "button" type = submit value = "Relatório">
				</form>
				<form style = "left:50%;"  class = "ccrud" method = post accept-charset="UTF-8" action = "produtividade.php">
					<p style = "font-family: tech; color: white; font-size: 20px;">Relatório de produtividade</p>
						
					<input type = text name = idfuncionario  placeholder = "CPF do funcionario">

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

