

<!DOCTYPE html>
<html>

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
					
					if(isset($_SESSION['usuario']) && isset($_SESSION['senha']) && $_SESSION['nome'] == "funcionario"){
						#$print = "<a id = 'fornecedor'  href = 'login_funcionario.php'>FUNCIONÁRIO</a>";
					}else if (!isset($_SESSION['usuario']) && !isset($_SESSION['senha'])){
						$print = " ";
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

<?php #include 'db.php' ?>
<?php include 'classe.php' ?>

<?php

	$obj = new Cliente();
	$obj->info_cliente($_SESSION['usuario']);




?>




	</body>
</html>

