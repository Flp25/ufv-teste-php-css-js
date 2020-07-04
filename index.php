

<!DOCTYPE html>
<html>
<?php

	#session_start();

?>
<style>
</style>


	<head>

		<meta charset = "UTF-8"/>
		<title> Homepage </title>
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
						$print = "<a onclick = 'restrict()'id = 'fornecedor'  href = 'login_funcionario.php'>FUNCIONÁRIO</a>";
					}
					echo $print;

						
				?>
				
				<a id = "atendimento"  href = "atendimento.php">ATENDIMENTO</a>
				<a id = "trabalhe_conosco"  href = "trabalhe_conosco.php">TRABALHE CONOSCO</a>
				<a id = "log_out" href = "logout.php" >LOGOUT</a></li>
			</ul>
		</div>

		
		<?php include 'db.php' ?>



	</head>



	<body>


		<text style = "color:white">*Caso a sessão do cliente esteja ativa o link funcionário permanecerá invisível na barra acima.</text>
		<?php
			
			
			//Caso o usuário não esteja autenticado, limpa os dados e redireciona
			if ( !isset($_SESSION['usuario']) and !isset($_SESSION['senha']) ) {
				//Destrói
				session_destroy();
				#echo "<html>Olá visitante.</html>";
				
				//Limpa
				unset ($_SESSION['usuario']);
				unset ($_SESSION['senha']);
				
				//Redireciona para a página de autenticação
			}
		?>
		<div class = "row" style = "border: solid rgba(50,50,255,.7) 3px; background-color: rgb(245,245,245);top: 100px; text-align:justify; font-family:tech; font-size: 11px;" >
			<div style = "height: 90%; margin-top:5px; padding:30px;">
			<h1>Sobre a Cartucho e Cia<h1>
				<p>A Cartucho & Cia. está sob nova direção desde 2012, 
				localizada na cidade de São Gotardo, Minas Gerais, 
				trazendo tudo o que há de melhor em artigos de papelaria e informática.</p>
				<p>Missão: A Cartucho e Cia. Tem como missão trazer o melhor em impressão para seus clientes, contamos com uma linha completa de cartuchos HP, dentre outros. Na papelaria temos os serviços de encadernação e plastificação de documentos. Realizamos também a formatação de computadores com a melhor qualidade e tempo hábil para seus clientes.</p>
				<p>Visão: Ser uma empresa competitiva que atue de forma abrangente no segmento da impressão, com um portfólio de produtos com qualidade, representado por marcas e representantes fortes, com boas características e boas propostas.</p>
				<p style = "text-align:left; right:50px;">Valores:</p>
				<ul style = "text-align:justify; ">
					<li>Liderança interativa</li>
					<li>Trabalho em equipe</li>
					<li>Proatividade</li>
					<li>Qualidade </li>
					<li>Ética e respeito</li>
					<li>Fidelidade</li>
				</ul>
				<img src = "imgs\sobre.jpg" style = "width:300px; position: relative; right; bottom:180px; padding-left:550px;">
				</div>

		</div>
		<div  style = "padding-left:20px;color:white;font-family:tech; text-align:justify;background-color:rgba(50,50,255,.1);height:210px;width:100%;border:solid white 3px;position:absolute; bottom: -340px; left;-10px;"><br>CARTUCHO E CIA 2018 
		<br><br><text style = "color:white; font-family:tech;">Rua Fictícia, número 000, Bairro Fictício.</text>
		<br><br><text style = "color:white; font-family:tech;">Telefone: (00) 0000-0000.</text>
		<br><br><text style = "color:white; font-family:tech;">CNPJ: 12.123.123/1234-12.</text>

		</div>




	</body>

</html>

