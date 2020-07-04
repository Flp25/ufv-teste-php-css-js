

<!DOCTYPE html>
<html>
<?php
	include 'classe.php';
	$obj = new Produto();
?>
<style>
</style>


	<head>

		<meta charset = "UTF-8"/>
		<title> Homepage </title>
		<link rel = "stylesheet" type = "text/css" href = "edit.css"/>

		<div style = "position:relative; top:-44px;"class = "bar">
			<ul>
				<li><a class = id = "logo"         href = "index.php">CARTUCHO E CIA</a>
				<a id = "produtos"     href = "produtos.php">PRODUTOS</a>
				<a id = "cliente"      href = "login_cliente.php">CLIENTE</a>
				<?php
					#session_start();
					$print = "";
					if(isset($_SESSION['usuario']) && isset($_SESSION['senha']) && $_SESSION['nome'] == "funcionario"){
						$print = "<a id = 'fornecedor'  href = 'login_funcionario.php'>FUNCIONÁRIO</a>";
					}else if (!isset($_SESSION['usuario']) && !isset($_SESSION['senha'])){
						$print = "<a id = 'fornecedor'  href = 'login_funcionario.php'>FUNCIONÁRIO</a>";
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

<?php 
	

	$obj->catalogo();

?>




	</body>
</html>

