

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
				#echo "<html>Olá visitante.</html>";
				//Limpa
				unset ($_SESSION['cpf']);
				unset ($_SESSION['senha']);
				
				//Redireciona para a página de autenticação
			}


		?>
		<div style = 'height: 450px;' class = "crud">		
				<form   style = 'height: 400px;'class = "lcrud" method = post accept-charset="UTF-8" enctype="multipart/form-data" action = "cadastro_servico.php">
					<p style = "font-family: tech; color: white; font-size: 20px;">Cadastrar serviço</p>
						
					<input type = text name = idservico  placeholder = "ID serviço ex: 100">
					<BR><BR>
					<input type = text name = preco placeholder = "Preço limite: R$ 999,99" >
					<BR><BR>
					<input type = text name = nome accept-charset="UTF-8" placeholder = "Nome do serviço" >
					<p style = "font-family: tech; color: white; font-size: 12px;">Tempo de execução (dias)</p>
					<select name = "execucao">
						<option value = "1">1</option>
						<option value = "2">2</option>
						<option value = "3">3</option>
						<option value = "4">4</option>
						<option value = "5">5</option>
						<option value = "6">6</option>
						<option value = "7">7</option>
					</select>
					<BR><BR>
					<textarea name = descricao row = "25" columns = "100" placeholder = "Descrição do serviço oferecido. *Tempo médio de execução do serviço deve ser informado neste campo."></textarea>
					<BR><BR>	



					<input class = "button" type = reset value = "Limpar">
					<BR><BR>
					<input class = "button" type = submit value = "Cadastrar">



				</form>
				<form  style = 'height: 400px;' class = "ccrud" method = post accept-charset="UTF-8" action = "pesquisa_servico.php">
					<p style = "font-family: tech; color: white; font-size: 20px;">Atualizar serviço</p>
					

						
					<input type = text name = idservico  placeholder = "ID serviço">

					<BR>
					<BR>
					<input class = "button" type = reset value = "Limpar">
					<BR>
					<BR>
					<input class = "button" type = submit value = "Pesquisar">
					



				</form>


				<form  style = 'height: 400px;' class = "rcrud" method = post accept-charset="UTF-8" action = "pesquisa_deleta_servico.php">
					<p style = "font-family: tech; color: white; font-size: 20px;">Remover serviço</p>
						
					<input type = text name = idservico  placeholder = "ID serviço">
						

					<BR>
					<BR>
					<input class = "button" type = reset value = "Limpar">
					<BR>
					<BR>
					<input class = "button" type = submit value = "Pesquisar">


				</form>


		</div>

		<div style = 'background-color: rgba(0,0,255,.1); height: 10px;' class = "bar" style = "font-family:arial; font-size: 16px;">
		</div>
		<div class = "crud" >		
				<form   style = 'height: 246px;' class = "lcrud" method = post accept-charset="UTF-8" enctype="multipart/form-data" action = "orcamento_servico.php">
					<p style = "font-family: tech; color: white; font-size: 20px;">Registrar orçamento</p>
						
					<input type = text name = idservico  placeholder = "ID serviço">

					<BR>
					<BR>
					<input class = "button" type = reset value = "Limpar">
					<BR>
					<BR>
					<input class = "button" type = submit value = "Pesquisar">


				</form>
				<form   style = 'height: 246px;'class = "ccrud" method = post accept-charset="UTF-8" action = "atualizar_orcamento.php">
					<p style = "font-family: tech; color: white; font-size: 20px;">Atualizar orçamento</p>
					

						
					<input type = text name = idsolicitacao  placeholder = "ID da solicitação">

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

