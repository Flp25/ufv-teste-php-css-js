<html>
	<head>
		<meta charset="utf-8"></meta>
		<title> Criar uma conta_cliente  </title>
		<link rel = "stylesheet" type = "text/css" href = "edit.css"/>
	
		<br>
		<br>


	</head>

	<body>

<?php
	include 'db.php';
	session_start();


	abstract class Pessoa {
		
		private $cpf;
		private $nome;
		private $senha;
		private $endereco;
		private $email;
		private $telefone;
		private $data_nascimento;

		

		function get_cpf(){
			
			return $this->cpf;

		}
		function set_cpf($arg){
			
			$this->cpf = trim($arg);

		}

		function get_nome(){
			
			return $this->nome;

		}
		function set_nome($arg){
			
			$this->nome = trim($arg);

		}


		function get_senha(){
				
			return $this->senha;

		}

		function set_senha($arg){
				
			if (strlen($arg) > 0)
				$this->senha = trim($arg);

		}


		function get_endereco(){
				
			return $this->endereco;

		}

		function set_endereco($arg){
				
			if (strlen($arg) > 0)
				$this->endereco = trim($arg);

		}

		function get_email(){
				
			return $this->email;

		}
		function set_email($arg){
				
			if (strlen($arg) > 0)
				$this->email = trim($arg);

		}



		function get_telefone(){
			
			return $this->telefone;

		}

		function set_telefone($arg){
			
			$this->telefone = trim($arg);

		}


		function get_data_nascimento(){
			
			return $this->data_nascimento;

		}
		function set_data_nascimento($arg){
			
			$this->data_nascimento = trim($arg);

		}



		function validar_cpf(){
			
			$temp = $this->get_cpf();
			$temp = preg_replace('/[^\d]/', '',$temp);
			$temp = trim($temp);
			$this->set_cpf(preg_replace('!\s+!', '', $temp));


			if (empty($this->get_cpf())){				
				echo "<script> window.alert('Erro - Campo CPF vazio!'); </script>";
				return false;
			}

			if(strpos($this->get_cpf(), " ")){
				
				echo "<script> window.alert('Erro - CPF contém espaços!'); </script>";
				return false;				
			}

			if(!is_numeric($this->get_cpf())){
				
				echo "<script> window.alert('Erro - CPF contém caracteres não numéricos!'); </script>";
				return false;

			}



			#if(!preg_match('|^[\pL\s]+$|u', $string)



			if (strlen($this->get_cpf()) < 11){
				echo "<script> window.alert('Erro - CPF possui menos de 11 caracteres!'); </script>";
				return false;
			}

			if (strlen($this->get_cpf()) > 11){
				echo "<script> window.alert('Erro - CPF possui mais de 11 caracteres!'); </script>";
				return false;
			}			

			return true;
		}


		function validar_senha(){

			
			$temp = $this->get_senha();
			$temp = preg_replace('/[^\d]/', '',$temp);
			$temp = trim($temp);
			$this->set_senha(preg_replace('!\s+!', '', $temp));	
					
			if(empty($this->get_senha())){
				echo "<script> window.alert('Erro - Campo Senha vazio!'); </script>";
				return false;

			}

			if(!is_numeric($this->get_senha())){
				echo "<script> window.alert('Erro - Campo Senha deve conter apenas símbolos numéricos!'); </script>";
				return false;				
					
			}
			if(strpos($this->get_senha(), " ")){
				echo "<script> window.alert('Erro - Campo Senha contém espaço(s)!'); </script>";
				return false;				
					
			}

			if(strlen($this->get_senha() <= 4)){
				echo "<script> window.alert('Erro - Campo Senha deve possuir pelo menos 5 caracteres numéricos!'); </script>";
				return false;				
			}



			return true;


		}

		function validar_nome(){
			
			$a = strtoupper($this->get_nome());
			$a = trim($a);
			$this->set_nome(preg_replace('!\s+!', ' ', $a));




			if(empty($this->get_nome())){
				echo "<script> window.alert('Erro - Campo Nome vazio!'); </script>";
				return false;

			}

			if(is_numeric($this->get_nome())){
				echo "<script> window.alert('Erro - Campo Nome contém caracteres inválidos!'); </script>";
				return false;		

			}

			    

			if(!preg_match('|^[\pL\s]+$|u', $this->get_nome())){
				echo "<script> window.alert('Erro - Campo Nome contém caracteres inválidos!'); </script>";
				return false;				

			}

			if(strlen($this->get_nome()) <= 2){
				echo "<script> window.alert('Erro - Campo Nome insuficiente!'); </script>";
				return false;				
			}



			return true;


		}


		function validar_endereco(){

			$a = strtoupper($this->get_endereco());
			$a = trim($a);
			

			$this->set_endereco(preg_replace('!\s+!', ' ', $a));
			$a = preg_replace('!\s+!', '', $a);
			

			if(empty($this->get_endereco())){
				echo "<script> window.alert('Erro - Campo Endereço vazio!'); </script>";
				return false;

			}

			if(strlen($this->get_endereco()) <= 3){
				echo "<script> window.alert('Erro - Campo Endereço insuficiente!'); </script>";
				return false;				
			}


			if(is_numeric($this->get_endereco())){
				echo "<script> window.alert('Erro - Campo Endereço contém apenas caracteres numéricos!'); </script>";
				return false;		

			}

			/*if (!ctype_alnum($a)){
				echo "<script> window.alert('Erro - Campo Endereço contém caracteres inválidos!'); </script>";
				return false;				

			}*/



			return true;

		}

		function validar_email(){

			
			$this->set_email(preg_replace('/\s+/', '', $this->get_email()));
			

			if(empty($this->get_email())){
				echo "<script> window.alert('Erro - Campo Email vazio!'); </script>";
				return false;

			}
			if (!strpos($this->get_email(), '@')) {
    			echo "<script> window.alert('Erro - Email inválido!'); </script>"; 
    			return false;
			}	

			if(strlen($this->get_email()) <= 4){
    			echo "<script> window.alert('Erro - Email inválido!'); </script>"; 
    			return false;				

			}

			return true;


		}

		function validar_telefone(){

			$arg = trim($this->get_telefone());
			$arg = preg_replace('/[^\d]/', '',$arg);
			$this->set_telefone(preg_replace('/\s+/', '', $arg));
			

			if(empty($this->get_telefone())){
				echo "<script> window.alert('Erro - Campo Email vazio!'); </script>";
				return false;

			}

			if(!is_numeric($this->get_telefone())){
				
				echo "<script> window.alert('Erro - Campo Telefone contém caracteres inválidos!'); </script>";
				return false;				
			}

			if(strlen($this->get_telefone() <= 7)){
				
				echo "<script> window.alert('Erro - Campo Telefone insuficiente!'); </script>";
				return false;				
			}

			if(strlen($this->get_telefone()) >= 12){
				
				echo "<script> window.alert('Erro - Campo Telefone excede o limite de 11 caracteres!'); </script>";
				return false;
			}

			

			return true;

		}

		function validar_data_nascimento(){

			$arg = trim($this->get_data_nascimento());
			$arg = preg_replace('/[^\d]/', '',$arg);
			$this->set_data_nascimento(preg_replace('/\s+/', '', $arg));
			
			if(empty($this->get_data_nascimento())){
				echo "<script> window.alert('Erro - Campo Data de nascimento vazio!'); </script>";
				return false;

			}
			
			if(!is_numeric($this->get_data_nascimento())){
				
				echo "<script> window.alert('Erro - Campo Data de nascimento possui símbolos inválidos!'); </script>";
				return false;				
			}
			
			if(strlen($this->get_data_nascimento()) != 6){
				
				echo "<script> window.alert('Erro - Campo Data de nascimento deve possuir apenas 6 caracteres numéricos no formato DDMMAA!'); </script>";
				return false;					
			}	
			
			return true;	

		}
		function validar_form(){

			

			if(!$this->validar_cpf())
				
				return false;
			if(!$this->validar_senha())
				
				return false;
			if(!$this->validar_nome())
				
				return false;

			if(!$this->validar_endereco())
				
				return false;
			if(!$this->validar_email())
				
				return false;
			if(!$this->validar_telefone())
				
				return false;
			if(!$this->validar_data_nascimento())
				return false;
			


			return true;

		}

		function logar($sql){
			
			$login = db_select($sql);

			return $login;

				
				
		}


		function logar_usuario($tabela, $tabela2, $on, $link, $link2){

				
			if(!isset($_POST["cpf"])){
				
				echo "<script> window.alert('Campo CPF vazio!')</script>";
				echo $link;

			}

			if(!isset($_POST["senha"])){
				
				echo "<script> window.alert('Campo senha vazio!')</script>";
				echo $link2;

			}

			$this->set_cpf($_POST["cpf"]);
			$this->set_senha($_POST["senha"]);

			if(!$this->validar_cpf() || !$this->validar_senha()){
				
				#echo "<script> window.alert('Campo senha vazio!')</script>";
				echo $link2;
			}

			$usuario = $_POST["cpf"];
			$senha   = $_POST["senha"];


			$sql = "SELECT * FROM $tabela JOIN $tabela2 on '$usuario' = $on  WHERE `cpf` like '$usuario' and `senha` like '$senha'";

			#$sql = "SELECT * FROM $tabela JOIN $tabela2 on `cpf` = '$on'  WHERE `cpf` like '$usuario' and `senha` like '$senha'";
			#var_dump($sql);
			$login = $this->logar($sql);

			if (isset($_SESSION['usuario']) and isset($_SESSION['senha']) ) {

				session_destroy();
				unset ($_SESSION['usuario']);
				unset ($_SESSION['senha']);
				unset ($_SESSION['nome']);
				echo "<script> window.alert('AQ!'); </script>";
				session_start();
			}

				

			if($login){
					
				$_SESSION['usuario'] = $_POST["cpf"];
				$_SESSION['senha'] = $_POST["senha"];

				if($tabela2 == "cliente"){
					$_SESSION['nome'] = $tabela2;
					echo "<script> window.alert('Bem-Vindo(a) Cliente!')</script>";
				}else{
					$_SESSION['nome'] = $tabela2;
					echo "<script> window.alert('Perfil funcionario logado')</script>";
				}
					

				#$_SESSION['nome'] = $_POST["nome"];
				#echo "<script> window.alert('Bem-Vindo(a) !')</script>";
				echo $link;
					
					

			}else{

				session_destroy();
				unset ($_SESSION['usuario']);
				unset ($_SESSION['senha']);
				unset ($_SESSION['nome']);
				echo "<script> window.alert('Usuário não encontrado!'); </script>";

				echo $link2;

					

			}				
		}
		
		function append_endereco($rua, $num, $bairro, $cidade){
			
			$rua = strtoupper($rua);
			$rua = trim($rua);
			$rua = preg_replace('!\s+!', ' ', $rua);
			$a = preg_replace('!\s+!', '', $rua);

			if(empty($rua)){
				echo "<script> window.alert('Erro - Campo Rua vazio!'); </script>";
				return false;					

			}



			/*if (!ctype_alnum($a)){
				echo "<script> window.alert('Erro - Campo Rua contém caracteres inválidos!'); </script>";
				return false;				

			}*/

			$num = strtoupper($num);
			$num = trim($num);
			$num = preg_replace('!\s+!', '', $num);
			$num = preg_replace('/[^\d]/', '',$num);
			#$num = preg_replace("/[^0-9]/", "", $num);

			if(empty($num)){
				echo "<script> window.alert('Erro - Campo Número vazio!'); </script>";
				return false;					

			}

			if(!is_numeric($num)){
				
				echo "<script> window.alert('Erro - Campo Número deve possuir apenas símbolos numéricos!'); </script>";
				return false;

			}

			$bairro = strtoupper($bairro);
			$bairro = trim($bairro);
			$bairro = preg_replace('!\s+!', ' ', $bairro);
			$a = preg_replace('!\s+!', '', $bairro);

			if(empty($bairro)){
				echo "<script> window.alert('Erro - Campo bairro vazio!'); </script>";
				return false;					

			}


			if (!ctype_alnum($a)){
				echo "<script> window.alert('Erro - Campo bairro contém caracteres inválidos!'); </script>";
				return false;				

			}

			$cidade = strtoupper($cidade);
			$cidade = trim($cidade);
			$cidade = preg_replace('!\s+!', ' ', $cidade);

			if(empty($cidade)){
				echo "<script> window.alert('Erro - Campo cidade vazio!'); </script>";
				return false;					

			}

			if(!preg_match('|^[\pL\s]+$|u', $a)){
				echo "<script> window.alert('Erro - Campo cidade deve ser composto apenas por letras e espaços!'); </script>";
				return false;				

			}



			$rua .= " ";
			$rua .= $num;

			$rua .= " ";
			$rua .= $bairro;

			$rua .= " ";
			$rua .= $cidade;	
			
			$this->set_endereco($rua);
			return true;		

		}	

		function atualizar_dados($tabela, $tabela_secundaria, $pk, $link, $link2, $id){
			
				#var_dump($_POST["cpf"]);
				$this->set_cpf($_POST["cpf"]);
				$this->set_nome($_POST["nome"]);
				$this->set_senha($_POST["senha"]);

				if(!$this->append_endereco($_POST["enderecoI"], $_POST["enderecoII"], $_POST["enderecoIII"], $_POST["enderecoIV"])){
					echo "<script> window.alert('Preencha novamente os dados'); </script>";
					echo $link2;
					

				}
					
					

				$this->set_email($_POST["email"]);
				$this->set_telefone($_POST["telefone"]);
				$this->set_data_nascimento($_POST["datanascimento"]);

				
				$retorno = $this->validar_form();
				
				if(!$retorno){
					echo "<script> window.alert('Preencha novamente os dados'); </script>";
					return false;
				}





				$cpf = $this->get_cpf();
				$nome = $this->get_nome();
				$senha = $this->get_senha();
				$endereco = $this->get_endereco();
				$email = $this->get_email();
				$telefone = $this->get_telefone();
				$datanascimento = $this->get_data_nascimento();

				$sql = "SELECT * FROM $tabela JOIN $tabela_secundaria on `cpf` = $pk WHERE `cpf` like $cpf";
				if(db_select($sql) == false){
					
					echo "<script> window.alert('Preencha novamente os dados'); </script>";
					return false;					
				}


				$sql = "UPDATE $tabela SET `cpf`='$cpf',`nome`='$nome',`senha`='$senha',`endereco`='$endereco',`email`='$email',`telefone`='$telefone',`datanascimento`='$datanascimento' WHERE `cpf`=$cpf";


				$a = db_update($sql);

				if(!$a){
					echo "<script> window.alert('Campo Data de nascimento inválido'); </script>";
					echo $link;

				}else{
					echo "<script> window.alert('Atualização concluída'); </script>";
					echo $link;
				}
				




		}

		function pesquisa($tabela, $tabela_secundaria, $pk, $link, $link2, $id, $action){
			
			#var_dump($_POST["cpf"]);
			if(!isset($_POST["cpf"])){
				echo "<script> window.alert('Informe o CPF'); </script>";
				echo $link2;			

			}
			$this->set_cpf($_POST["cpf"]);

			$this->validar_cpf();

			$usuario = $this->get_cpf();
			$sql = "SELECT * FROM $tabela JOIN $tabela_secundaria on `cpf` = $pk WHERE `cpf` like $usuario";


			
			if(db_select($sql) == false){
				
				echo "<script> window.alert('Erro - O CPF especificado não foi encontrado!'); </script>";
				echo $link2;
				
			}else{
				
				echo "<script> window.alert('Usuário encontrado!'); </script>";				
				$busca = db_update($sql);

				$i = 1;
			    while($dados = mysqli_fetch_array($busca)){

			    	$print = "";
			    	$print .= "<html><div style = 'left: 150px; top:20px;'class='lupdate' style = 'font-family: courier;'><br>";
			    	$print .= "Perfil encontrado";
			    	$print .= "<p>Nome: ".$dados["nome"]."</p>";
			    	$print .= "<p>Senha: ".$dados["senha"]."</p>";
			    	$print .= "<p>CPF: ".$dados["cpf"]."</p>";
			    	$print .= "<p>ID: ".$dados[$id]."</p>";
			    	$print .= "<p>Endereço: ".$dados["endereco"]."</p>";
			    	$print .= "<p>Email: ".$dados["email"]."</p>";
			    	$print .= "<p>Telefone: ".$dados["telefone"]."</p>";
			    	$print .= "<p>Data de nascimento: ".$dados["datanascimento"]."</p>";
			    	$print .= "<p style = 'text-align: left;'>_____________________________________________<br><br></p><p>**Para realizar a alteração do 	endereço preencha todos os campos.</p>
			    	<br>";
			    	if($action == "update_pagina_cliente.php"){
			    		
			    		$print .= "<form style = 'position: absolute; bottom: 70px; left: 40px;' method = post accept-charset='UTF-8' action ='pagina_cliente.php' ><input class = 'button' 		type = submit value = 'Voltar'></form>";
			    	}else{
			    		$print .="<form style = 'position: absolute; bottom: 70px; left: 40px;' method = post accept-charset='UTF-8' action ='atualizar.php' ><input class = 'button' 		type = submit value = 'Voltar'></form>";

			    	}

			    	
			    	#$print .= "</div>";

			        $print .= "<form   style = 'top:60px; left:650px;'class = 'rcrud' method = post accept-charset='UTF-8' action = ".$action."><p style = 'font-family: tech; left: 200px font-size: 20px;'>Atualização do perfil</p><input type = hidden name = cpf  placeholder = 'CPF' value = ".$dados["cpf"]."><input type = text name = senha placeholder = 'Senha numérica' value = ".$dados["senha"]."><input type = text name = nome accept-charset='UTF-8' placeholder = 'Nome' value = ".$dados["nome"]."><input type = text name = datanascimento placeholder = 'Nascimento AAMMDD'value = ><p style = 'font-family: tech; color: white; font-size: 14px;'>Endereço</p><input type = text name = enderecoI accept-charset='UTF-8' placeholder = 'Rua, Avenida' ><input type = text name = enderecoII accept-charset='UTF-8' placeholder = 'Número' ><input type = text name = enderecoIII accept-charset='UTF-8' placeholder = 'Bairro' ><input type = text name = enderecoIV accept-charset='UTF-8' placeholder = 'Cidade' ><BR><p style = 'font-family: tech; color: white; font-size: 14px;'>Contato</p>	<input type = text name = email placeholder = 'Email' value = ".$dados["email"]."><input type = text name = telefone placeholder = 'Telefone 00000000' value = ".$dados["telefone"]."><BR><BR><input class = 'button' type = reset value = 'Limpar'><input class = 'button' type = submit value = 'Atualizar'></form>";
			        $print .= "</div></html>";
			        echo $print;
			        $i++;
			    }
				

			}

		}

		function deletar_usuario($tabela, $tabela_secundaria, $pk, $link, $link2, $id){
			
			$this->set_cpf($_POST["cpf"]);
			if(!$this->validar_cpf()){
				return false;

			}
			$cpf = $this->get_cpf();

			$sql = "DELETE FROM $tabela_secundaria WHERE $pk = $cpf";
			$sql2 = "DELETE FROM `servico_prestado` WHERE $id = $cpf";

			db_delete($sql2);

			if(db_delete($sql)){
				
				$sql = "DELETE FROM $tabela WHERE `cpf` = $cpf";
				db_delete($sql);
				echo "<script> window.alert('Perfil deletado com sucesso!'); </script>";
				echo $link;

			}else{
				echo "<script> window.alert('Erro ao deletar perfil especificado!'); </script>";
				echo $link2;
			}

		}
		function remover($tabela, $tabela_secundaria, $pk, $link, $link2, $id, $action){
			
			#var_dump($_POST["cpf"]);
			$this->set_cpf($_POST["cpf"]);

			$this->validar_cpf();

			$usuario = $this->get_cpf();
			$sql = "SELECT * FROM $tabela JOIN $tabela_secundaria on `cpf` = $pk WHERE `cpf` like $usuario";


			
			if(db_select($sql) == false){
				
				echo "<script> window.alert('Erro - O CPF especificado não foi encontrado!'); </script>";
				echo $link2;
				
			}else{
				
				echo "<script> window.alert('Usuário encontrado!'); </script>";				
				$busca = db_update($sql);

				$i = 1;
			    while($dados = mysqli_fetch_array($busca)){

			    	$print = "";
			    	$print .= "<html><div class='lupdate' style = 'font-family: courier; left: 30%; '><br>";
			    	$print .= "Perfil encontrado";
			    	$print .= "<p>Nome: ".$dados["nome"]."</p>";
			    	$print .= "<p>Senha: ".$dados["senha"]."</p>";
			    	$print .= "<p>CPF: ".$dados["cpf"]."</p>";
			    	$print .= "<p>ID: ".$dados[$id]."</p>";
			    	$print .= "<p>Endereço: ".$dados["endereco"]."</p>";
			    	$print .= "<p>Email: ".$dados["email"]."</p>";
			    	$print .= "<p>Telefone: ".$dados["telefone"]."</p>";
			    	$print .= "<p>Data de nascimento: ".$dados["datanascimento"]."</p>";
			    	$print .= "<p><br><br></p>";
			        $print .= "<form style = 'position: absolute; bottom: 100px; left: 280px;' method = post accept-charset='UTF-8' action = ".$action."><input type = hidden name = cpf  placeholder = 'CPF' value = ".$dados["cpf"]."><input class = 'button' type = submit value = 'Deletar perfil'></form>
			        <br>
			        <form style = 'position: absolute; bottom: 100px; left: 40px;' method = post accept-charset='UTF-8' action = 'remove.php'><input class = 'button' type = submit value = 'Voltar'></form>";
			        $print .= "</div></html>";
			        echo $print;
			        $i++;
			    }
				

			}

		}

	}

?>
<?php

		class Fornecedor extends Pessoa{

			private $cnpj;

			function __construct(){
			
				Pessoa::set_nome("");
				Pessoa::set_email("");
				Pessoa::set_telefone("");
			}			

			function get_cnpj(){
				
				return $this->cnpj;

			}

			function set_cnpj($arg){
				
				$arg = preg_replace('/[^\d]/', '',$arg);
				$this->cnpj = $arg;

			}
			function validar_cnpj(){

			$num = strtoupper($this->get_cnpj());
			$num = trim($num);
			$this->set_cnpj(preg_replace('!\s+!', '', $num));

				if(empty($this->get_cnpj())){
					
				echo "<script> window.alert('Erro - Campo CNPJ vazio!'); </script>";
				return false;	
				}

				if(!is_numeric($this->get_cnpj())){
					
				echo "<script> window.alert('Erro - Campo CNPJ deve ser composto apenas de números!'); </script>";
				return false;	
				}

				if(strlen($this->get_cnpj()) != 14){
					
				echo "<script> window.alert('Erro - Campo CNPJ deve possuir 14 caracteres numéricos sem espaços!'); </script>";
				return false;						
				}

				return true;

			}
			function validar_fornecedor(){
				

				if($this->validar_cnpj() == false || Pessoa::validar_email() == false || Pessoa::validar_telefone() == false){
					
					return false;
				}else{

						
					$this->set_nome(preg_replace('!\s+!', ' ', $this->get_nome()));

										
				}
				

				return true;			
			}
			#function atualizar_dados_fornecedor($tabela, $tabela_secundaria, $pk, $link, $link2, $id){}
			function pesquisa_fornecedor($tabela, $tabela_secundaria, $pk, $link, $link2){

				if(!isset($_POST["cnpj"])){
					echo "<script> window.alert('Informe o CNPJ'); </script>";
					echo $link2;			

				}
				$this->set_cnpj($_POST["cnpj"]);

				if($this->validar_cnpj() == false)
					echo $link2;

				$usuario = $this->get_cnpj();
				$sql = "SELECT * FROM $tabela WHERE `cnpj` like $usuario";


				
				if(db_select($sql) == false){
					
					echo "<script> window.alert('Erro - O CNPJ especificado não foi encontrado!'); </script>";
					echo $link2;
					
				}else{
					
					echo "<script> window.alert('Usuário encontrado!'); </script>";				
					$busca = db_update($sql);

					$i = 1;
				    while($dados = mysqli_fetch_array($busca)){

				    	$print = "";
				    	$print .= "<html><div class='lupdate' style = 'left: 150px; top:20px;' ><br>";
				    	$print .= "Perfil encontrado";
				    	$print .= "<p>Nome: ".$dados["nome"]."</p>";
				    	$print .= "<p>Senha: ".$dados["cnpj"]."</p>";
				    	$print .= "<p>CPF: ".$dados["email"]."</p>";
				    	$print .= "<p>Telefone: ".$dados["telefone"]."</p>";
				    	$print .= "<p>________________________________________<br><br></p><p>**CNPJ contém 14 dígitos.</p><br>
				    	<form style = 'position: absolute; bottom: 170px; left: 177px;' method = post accept-charset='UTF-8' action ='atualizar.php' ><input class = 'button' 		type = submit value = 'Voltar'></form>";
				    	#$print .= "</div>";

				        $print .= "<form style = 'top:60px; left:650px;'  class = 'rcrud' method = post accept-charset='UTF-8' action = 'update_fornecedor.php'><p style = 'font-family: tech; left: 200px font-size: 20px; '>Atualização do perfil</p><input type = hidden name = cnpj  placeholder = 'CNPJ' value = ".$dados["cnpj"]."><input type = text name = nome placeholder = 'Nome' value = ".$dados["nome"]."><input type = text name = email accept-charset='UTF-8' placeholder = 'Email' value = ".$dados["email"]."><input type = text name = telefone placeholder = 'Telefone 00000000' value = ".$dados["telefone"]."><BR><BR><input class = 'button' type = reset value = 'reset'><input class = 'button' type = submit value = 'send'></form>";
				        $print .= "</div></html>";
				        echo $print;
				        $i++;
					}

				}
			}

			function deletar_fornecedor($tabela, $tabela_secundaria, $pk, $link, $link2, $id){
				
				$this->set_cnpj($_POST["cnpj"]);
				if(!$this->validar_cnpj()){
					return false;

				}
				$cnpj = $this->get_cnpj();

				$sql = "DELETE FROM $tabela_secundaria WHERE `cnpj_fornecedor` = $cnpj";
				db_delete($sql);

				$sql = "DELETE FROM $tabela WHERE `cnpj` = $cnpj";
				if(db_delete($sql)){
					
					#$sql = "DELETE FROM $tabela WHERE `cpf` = $cpf";
					#db_delete($sql);
					echo "<script> window.alert('Perfil deletado com sucesso!'); </script>";
					echo $link;

				}else{
					echo "<script> window.alert('Erro ao deletar perfil especificado!'); </script>";
					echo $link2;
				}

			}
			function remover_fornecedor($tabela, $tabela_secundaria, $pk, $link, $link2, $id, $action){
			
				#var_dump($_POST["cnpj"]);
				$this->set_cnpj($_POST["cnpj"]);

				$this->validar_cnpj();

				$usuario = $this->get_cnpj();
				$sql = "SELECT * FROM $tabela WHERE `cnpj` like $usuario";


				
				if(db_select($sql) == false){
					
					echo "<script> window.alert('Erro - O CNPJ especificado não foi encontrado!'); </script>";
					echo $link2;
					
				}else{
					
					echo "<script> window.alert('Usuário encontrado!'); </script>";				
					$busca = db_update($sql);
					$i = 1;
				    while($dados = mysqli_fetch_array($busca)){

				    	$print = "";
				    	$print .= "<html><div class='lupdate' style = 'font-family: courier; left: 30%; '><br>";
				    	$print .= "Perfil encontrado";
				    	$print .= "<p>Nome: ".$dados["nome"]."</p>";
				    	$print .= "<p>Senha: ".$dados["cnpj"]."</p>";
				    	$print .= "<p>CPF: ".$dados["email"]."</p>";
				    	$print .= "<p>Telefone: ".$dados["telefone"]."</p>";
				    	$print .= "<p><br><br></p>";
				        $print .= "<form style = 'position: absolute; bottom: 100px; left: 280px;' method = post accept-charset='UTF-8' action = ".$action."><input type = hidden name = cnpj  placeholder = 'CNPJ' value = ".$dados["cnpj"]."><input class = 'button' type = submit value = 'Deletar perfil'></form>
				        <br>
				        <form style = 'position: absolute; bottom: 100px; left: 40px;' method = post accept-charset='UTF-8' action = 'remove.php'><input class = 'button' type = submit value = 'Voltar'></form>";
				        $print .= "</div></html>";
				        echo $print;
				        $i++;
				    }
					

				}
			}



			function cadastro_fornecedor($link2){
			
				$this->set_cnpj($_POST["cnpj"]);
				Pessoa::set_nome($_POST["nome"]);
				Pessoa::set_email($_POST["email"]);
				Pessoa::set_telefone($_POST["telefone"]);


				if(!$this->validar_fornecedor()){
					
					echo "<script> window.alert('Preencha novamente os campos!'); </script>";
					echo $link2;	
									
				}else{

					
					$cnpj = $this->get_cnpj();
					$nome = $this->get_nome();
					$email = $this->get_email();
					$telefone = $this->get_telefone();

					$sql = "INSERT INTO `fornecedor` (`cnpj`, `nome`, `email`, `telefone`) VALUES ('$cnpj', '$nome', '$email', '$telefone')";


					
					#$insert  = mysqli_query($connect, $sql);
					$insert  = db_insert($sql);

					if(!$insert){

						echo "<script> window.alert('Erro - CNPJ informado [ $cnpj ] já possui um cadastro no sistema!'); </script>";
						echo $link2;

					}else{
						echo "<script> window.alert('Cadastro concluido!'); </script>";
						echo $link2;

					}
				}
			}
		}

		class Funcionario extends Pessoa{
			
			function __construct(){
				
				Pessoa::set_cpf("0");
				Pessoa::set_nome("0");
				Pessoa::set_senha("0");

				Pessoa::set_endereco("0");
				Pessoa::set_email("0");
				Pessoa::set_telefone("0");
				Pessoa::set_data_nascimento("0");
			}

			function lg(){
				

				$tabela  = "pessoa";
				$tabela2 = "funcionario";
				$usuario = $_POST["cpf"];
				$senha   = $_POST["senha"];


				$form_page = "login_funcionario.php";
				$form_page2 = "crud_func.php";



				$sql = "SELECT * FROM $tabela JOIN $tabela2 on '$usuario' = `cpf_funcionario`  WHERE `cpf` like '$usuario' and `senha` like '$senha'";

				$login = Pessoa::logar($sql);

				if (isset($_SESSION['usuario']) and isset($_SESSION['senha']) ) {

					session_destroy();
					unset ($_SESSION['usuario']);
					unset ($_SESSION['senha']);
					#unset ($_SESSION['nome']);
					echo "<script> window.alert('AQ!'); </script>";
					session_start();
				}

				if($login){

					$_SESSION['usuario'] = $_POST["cpf"];
					$_SESSION['senha'] = $_POST["senha"];
					#$_SESSION
					echo "<script> window.alert('Perfil funcionario logado!')</script>";
					echo "<script> location.href='crud_func.php'</script>";					

				}else if ( !isset($_SESSION['usuario']) and !isset($_SESSION['senha']) ) {

					session_destroy();


					unset ($_SESSION['usuario']);
					unset ($_SESSION['senha']);
					echo "<script> window.alert('Login / senha incorreto !')</script>";
					echo "<script> location.href='login_funcionario.html'</script>";
					

				}		

			}
			
			function produtividade($link, $link2){
				

				$this->set_cpf($_POST["idfuncionario"]);
				if(!$this->validar_cpf()){
					
					echo "<script> window.alert('Preencha novamente o campo!')</script>";
					echo $link;

				}

				$id_funcionario = $this->get_cpf();

				$total = 0;
				$sql = "SELECT `id_solicitacao`, `id_servico`, `status`, `rating` FROM `servico_prestado` WHERE '$id_funcionario' like `id_funcionario`";

				if(!db_select_list($sql)){
					
					echo "<script> window.alert('Funcionario não possui nenhum serviço prestado!')</script>";
					echo $link;
					
					# var_dump($sql);

				}else{
					
					$sql = "SELECT `nome` FROM `pessoa` WHERE '$id_funcionario' like `cpf`";
					$temp = db_update($sql);
					$temp = mysqli_fetch_array($temp);


					$sql = "SELECT `id_solicitacao`, `id_servico`, `status`, `observacao`, `rating` FROM `servico_prestado` WHERE '$id_funcionario' like `id_funcionario`";
					$busca = db_update($sql);

					$i = 1;
					
					$print = "";
					$print = "		<div class = 'bar' style = 'margin-bottom:20px;position:absolute;top:2px;font-family:arial; font-size: 16px;'>
				<ul>
					<li><a class = id = 'logo'         href = 'logout_func.php'>LOG OUT</a>
					<a id = 'produtos'     href = 'crud_func.php'>CADASTRAR PERFIL</a>
					<a id = 'cliente'      href = 'atualizar.php'>ATUALIZAR PERFIL</a>
					<a id = 'fornecedor'   href = 'remove.php'>REMOVER PERFIL</a>
					<a id = 'atendimento'  href = 'relatorio.php'>RELATÓRIOS</a>
					<a id = 'trabalhe_conosco'  href = 'crud_servico.php'>SERVIÇOS</a>
					<a id = 'log_out' href = 'crud_produto.php' >PRODUTOS</a></li>
				</ul>
			</div>";
					echo $print;
					$print = "";
				    $print .= "<html><div style = 'padding-left:10%;text-align:justify;z-index:1; overflow: auto;left:25%;top:30px;position:relative;color:white;font-family:tech;width:50%;height:100%; ' class='ccrud' ><br>";
				    $print .= "Serviços prestados por ".$temp["nome"]."<br><br> CPF: ".$id_funcionario.".<br><br>";
				    while($dados = mysqli_fetch_array($busca)){

				    	$print .="<p>ID orçamento: ".$dados["id_solicitacao"]."</p>";
				    	$print .="<p>ID serviço: ".$dados["id_servico"]."</p>";
				    	$print .="<p>Status do serviço: ".$dados["status"]."</p>";

				    	if($dados["rating"] != NULL){
				    		$print .="<p>Rating do cliente: ".$dados["rating"]."</p>";

				    	}
				    	$print .="<p>Observação: ".$dados["observacao"]."</p><br>";

				        
				        echo $print;
				        $print = "";
				        $i++;
				    }	
				    $print ="";
				    $print .= "</html>";
				    echo $print;
				}



			}	

		}

?>
<?php
		class Produto extends Fornecedor{
			
			private $idproduto;
			private $nome;
			private $preco;
			private $estoque;
			private $cnpj_fornecedor;
			private $path;
			private $descricao;
			private $nome_img;

			function __construct(){
				
				$idproduto = "";
				$nome = "";
				$preco = "";
				$estoque = "";
				$cnpj_fornecedor = "";
				$path = "";
				$descricao = "";

			}

			function get_idproduto(){
				
				return $this->idproduto;

			}

			function set_idproduto($arg){
				
				$arg = preg_replace('/[^\d]/', '',$arg);
				$this->idproduto = trim($arg);

			}		

			function get_nome(){
				
				return $this->nome;

			}

			function set_nome($arg){
				
				$this->nome = trim($arg);

			}	

			function get_nome_img(){
				
				return $this->nome_img;

			}

			function set_nome_img($arg){
				
				$this->nome_img = trim($arg);

			}
			
			function get_preco(){
				
				return $this->preco;

			}

			function set_preco($arg){

				#$arg = str_replace('.','',$arg);
				#$arg = str_replace(',','.',$arg);

				
				$this->preco = trim($arg);

			}			
			function get_estoque(){
				
				return $this->estoque;

			}

			function set_estoque($arg){
				
				$arg = preg_replace('/[^\d]/', '',$arg);
				$this->estoque = trim($arg);

			}
			
			function get_cnpj_fornecedor(){
				
				return $this->cnpj_fornecedor;

			}

			function set_cnpj_fornecedor($arg){
				
				$arg = preg_replace('/[^\d]/', '',$arg);
				$this->cnpj_fornecedor = trim($arg);

			}	
			
			
			function get_path(){
				
				return $this->path;

			}

			function set_path($arg){

				$arg = strtolower ( $arg );
				$this->path = trim($arg);

			}
			
			
			function get_descricao(){
				
				return $this->descricao;

			}

			function set_descricao($arg){
				
				if(strlen($arg) > 0){
					$arg = preg_replace('!\s+!', ' ', $arg);
					$this->descricao = trim($arg);
				}

			}	

			function validar_idproduto(){
				

				$this->set_idproduto(preg_replace('!\s+!', '', $this->get_idproduto()));
				if(empty($this->get_idproduto())){
					
					echo "<script> window.alert('Erro - Campo ID vazio!'); </script>";
					return false;

				}
				if(strlen($this->get_idproduto())<= 0 || strlen($this->get_idproduto()) > 6){
					
					echo "<script> window.alert('Erro - Campo ID deve possuir entre 1 e 5 caracteres numéricos!'); </script>";
					return false;

				}

				if(!is_numeric($this->get_idproduto())){
					
					echo "<script> window.alert('Erro - Campo ID contém caracteres não numéricos!'); </script>";
					return false;

				}

				if (!ctype_alnum($this->get_idproduto())){
					echo "<script> window.alert('Erro - Campo ID contém caracteres não numéricos!'); </script>";
					return false;				

				}

				return true;

			}

			function validar_preco(){
				
				$this->set_preco(preg_replace('!\s+!', '', $this->get_preco()));
				$temp = "/^[0-9]{1,3}([.]([0-9]{3}))*[,]([.]{0})[0-9]{0,2}$/";

				if(!preg_match($temp,$this->get_preco())){
					
					echo "<script> window.alert('Erro - Campo preço com formato inválido!'); </script>";
					return false;

				}
				#$this->set_preco(preg_replace('!\s+!', '', $this->get_preco()));
				$arg = str_replace('.','',$this->get_preco());
				$arg = str_replace(',','.',$arg);
				$this->set_preco($arg);

				if(empty($this->get_preco())){
					
					echo "<script> window.alert('Erro - Campo preço vazio!'); </script>";
					return false;

				}

				if(strlen($this->get_preco()) <= 0){
					

					echo "<script> window.alert('Erro - Campo preço vazio!'); </script>";
					return false;
										
				}

				if(strlen($this->get_preco()) > 6){
					

					echo "<script> window.alert('Erro - Limite de preço permitido R$ 0 até R$ 999,99'); </script>";
					return false;
										
				}

				if($this->get_preco() <= 0){
					

					echo "<script> window.alert('Erro - Preço negativo!'); </script>";
					return false;

				}


				return true;

			}

			function validar_estoque(){
				
				$this->set_estoque(preg_replace('/[^\d]/', '',$this->get_estoque()));
				$this->set_estoque(preg_replace('!\s+!', '', $this->get_estoque()));

				if(empty($this->get_estoque())){
					
					echo "<script> window.alert('Erro - Campo estoque vazio!'); </script>";
					return false;					
				}

				if(strlen($this->get_estoque()) <= 0){
					
					echo "<script> window.alert('Erro - Campo estoque vazio!'); </script>";
					return false;						
				}

				if(!is_numeric($this->get_estoque())){

					echo "<script> window.alert('Erro - Campo estoque contém caracteres não numéricos!'); </script>";
					return false;

				}

				if (!ctype_alnum($this->get_estoque())){
					echo "<script> window.alert('Erro - Campo estoque contém caracteres não numéricos!'); </script>";
					return false;				

				}	
				
				return true;			



			}

			function validar_nome(){
				

				$this->set_nome(preg_replace('/[^\w]/', ' ',$this->get_nome()));
				$this->set_nome(preg_replace('!\s+!', ' ', $this->get_nome()));

				if(empty($this->get_nome())){
					
					echo "<script> window.alert('Erro - Campo nome vazio!'); </script>";
					return false;						
				}

				return true;


			}

			function validar_nome_img(){
				

				#$this->set_nome_img(preg_replace('/[^\w]/', '',$this->get_nome_img()));
				$this->set_nome_img(preg_replace('!\s+!', '', $this->get_nome_img()));

				if(empty($this->get_nome_img())){
					
					echo "<script> window.alert('Erro - Arquivo de imagem possui um nome inválido!'); </script>";
					return false;						
				}

				if(!strstr('.jpeg;.jpg;.png', $this->get_path())){
					
					echo "<script> window.alert('Erro - A extensão do arquivo deve ser '.png, .jpg, .jpeg'!'); </script>";
					return false;							
				}

				
				#$arg = $this->get_nome_img();
				#$arg .= $this->get_path();
				$temp = $_FILES[ 'arquivo' ][ 'tmp_name' ];
				
				$save = $this->get_idproduto().'.'.$this->get_path();
				$save = "produtos/".$save;
				$this->set_nome_img($save);

				if ( move_uploaded_file ( $temp, $save ) ) {
					return true;
		        }
		        
		        echo "<script> window.alert('Erro - Não foi possível realizar o upload da imagem!'); </script>";
				return false;


			}

			function validar_produto(){

				

				if(!$this->validar_idproduto())
					return false;

				if(!$this->validar_preco())
					return false;

				if(!$this->validar_estoque())
					return false;

				if(!$this->validar_nome())
					return false;

				return true;

			}

			function catalogo(){
				
				$sql = "SELECT * FROM `produto`";
				$busca = db_update($sql);
				$jump = "<br><br><br><br><br>>";
				$i = 1;
				$print = "<html><div class='row' ><br>";
				while($dados = mysqli_fetch_array($busca)){

				   	$print = "";
				   	#$print .= "<html><div class='row' ><br>";
				   	$print .=  "
								<table class = 'coluna'>
									<tr>
										<td>
										<div>
											<td>
												<div >
													<h1>".$dados["nome"]."</h1>
												</div>
												
												<div >
													<img src=".$dados["path"].">
												</div>
												
												<div>
													<p style = 'text-align: center;'>".$dados["descricao"]."</p>
												</div>
												<div>
													<p style = 'font-size:20px;'>R$".$dados["preco"]."</p>
												</div>
											</td>

											
										</div>
									
										</td>
									</tr>
								</table>";
					$print .= $jump;		

				    echo $print;
				    $print = "";
				    #var_dump($print);
				    $i++;
				}
				$print .= "</div></html>";
				#var_dump($i);

			}
			function deletar_img($tabela, $tabela_secundaria, $fk, $link, $link2, $id, $action){
				
				$this->set_idproduto($_POST["idproduto"]);			
				$idproduto = $this->get_idproduto();
				$sql = "SELECT * FROM $tabela WHERE `idproduto` like $idproduto";
								
				if(db_select($sql) == false){
					
					echo "<script> window.alert('Erro - O ID especificado não foi encontrado!'); </script>";
					echo $link2;
					
				}

				$sql = "DELETE FROM $tabela WHERE `idproduto` = $idproduto";
				if(db_delete($sql)){
					

					echo "<script> window.alert('Produto deletado com sucesso!'); </script>";
					echo $link;

				}else{
					echo "<script> window.alert('Erro ao deletar produto especificado!'); </script>";
					echo $link2;
				}


			}

			
			function remover_produto($tabela, $tabela_secundaria, $fk, $link, $link2, $id, $action){
				
				$this->set_idproduto($_POST["idproduto"]);

				if(!$this->validar_idproduto()){
					
					#echo "<script> window.alert('Erro - '); </script>";
					echo $link;					
				}

				$idproduto = $this->get_idproduto();
				$sql = "SELECT * FROM $tabela WHERE `idproduto` like $idproduto";
								
				if(db_select($sql) == false){
					
					echo "<script> window.alert('Erro - O ID especificado não foi encontrado!'); </script>";
					echo $link2;
					
				}

				$busca = db_update($sql);					
				$i = 1;

				while($dados = mysqli_fetch_array($busca)){

				   	$print = "";
				   	$print .= "<html><div class='lupdate' style = 'font-family: courier; left: 30%; width: 600px;'><br>";
				   
				   	$print .= "Produto encontrado";
				   	$print .= "<p>ID: ".$dados["idproduto"]."</p>";
				    $print .= "<p>Nome: ".$dados["nome"]."</p>";
				   	$print .= "<p>Preço: R$".$dados["preco"]."</p>";
				    $print .= "<p>Estoque: ".$dados["estoque"]."</p>";
				    $print .= "<p>CNPJ do fornecedor: ".$dados["cnpj_fornecedor"]."</p>";
				    #$print .= "<p>Descrição: ".$dados["descricao"]."</p>";

				    if(isset($dados["path"])){
				    	$print .= "<p>Path da imagem anexada: ".$dados["path"]."</p><br>";
				    	$print .= "<img style = 'border: solid gray 1px;' src=".$dados["path"]." alt='imagem'><br><br>";

				    }


				    $print .= "<form style = 'position: absolute; bottom: 100px; left: 280px;' method = post accept-charset='UTF-8' action = ".$action." ><input type = hidden name = idproduto  placeholder = 'idproduto' value = ".$dados["idproduto"]."><input style = 'position: absolute;top: 70px; left: 150px;' class = 'button' type = submit value = 'Deletar produto'></form>";

				    $print .= "<form style = 'position: absolute; bottom: 100px; left: 280px;' method = post accept-charset='UTF-8' action = 'crud_produto.php' ><input style = 'position: absolute;top: 0px; left: 150px;' class = 'button' 		type = submit value = 'Voltar'></form>";
				    
				    #$print .= "</form>";
				    #$print .= "<form style = 'left: 150px; top:20px;' method = post accept-charset='UTF-8' action = ".$action."><input type = hidden name = idproduto  placeholder = 'idproduto' value = ".$dados["idproduto"]."><input class = 'button' type = submit value = 'Deletar perfil'></form>
				    #<br>";
				    #<form style = 'position: absolute; bottom: 100px; left: 40px;' method = post accept-charset='UTF-8' action = 'crud_produto.php'><input class = 'button' type = submit value = 'Voltar'></form>";
				    #$print .= "<form style = 'top:60px; left:650px; width: 400px; height: 580px;'  class = 'rcrud' method = post accept-charset='UTF-8' action = 'update_produto.php' enctype='multipart/form-data'><p style = 'font-family: tech; left: 200px font-size: 20px; '>Atualização do produto</p><input type = hidden name = idproduto  placeholder = 'idproduto' value = ".$dados["idproduto"]."><BR><BR><input type = text name = nome placeholder = 'Nome do produto' value = ".$dados["nome"]."><BR><BR><input type = text name = preco accept-charset='UTF-8' placeholder = 'Preço ex: 999,89' ><BR><BR><input type = text name = estoque placeholder = 'Estoque ex: 1000' value = ".$dados["estoque"]."><BR><BR><input type = text name = cnpj placeholder = 'CNPJ Fornecedor' value = ".$dados["cnpj_fornecedor"]."><BR><BR><input  name='arquivo' type='file' ><BR><BR><textarea name = descricao row = '25' columns = '100' placeholder = 'Descrição do produto.'></textarea><BR><BR><BR><BR><input class = 'button' type = reset value = 'reset'><BR><BR><input class = 'button' type = submit value = 'send'></form>";
				    $print .= "</div></html>";
				    echo $print;
				    $i++;
				}

			}

			function atualizar_dados_produto($produto, $link, $fornecedor, $link2){
				

				if(!isset($_FILES['arquivo']['name'] ) && $_FILES['arquivo']['error'] == 0){
					
					echo "<script> window.alert('Erro - Para realizar a atualização do produto é preciso anexar uma imagem!'); </script>";
					echo $link;
					
				}

				$this->set_idproduto($_POST["idproduto"]);
				$this->set_nome($_POST["nome"]);
				$this->set_preco($_POST["preco"]);
				$this->set_estoque($_POST["estoque"]);
				$this->set_descricao($_POST["descricao"]);
				$this->set_nome_img($_FILES['arquivo']['name']);
				$this->set_path(pathinfo ( $this->get_nome_img(), PATHINFO_EXTENSION ));

				Fornecedor::set_cnpj($_POST["cnpj"]);		
				
				if(!Fornecedor::validar_cnpj()){
					
					echo "<script> window.alert('Erro - Preencha novamente os campos!'); </script>";
					echo $link;
					

				}

				$retorno = $this->validar_produto();

				if(!$retorno){
					
					echo "<script> window.alert('Erro - Preencha novamente os campos!'); </script>";
					echo $link;

				}	
				
				$idproduto = $this->get_idproduto();
				$preco = $this->get_preco();
				$estoque = $this->get_estoque();
				$nome = $this->get_nome();
				$nome_img = $this->get_nome_img();

				$cnpj = Fornecedor::get_cnpj();

				$descricao = $this->get_descricao();

				$sql = "SELECT * FROM $fornecedor WHERE `cnpj` like '$cnpj'";

				if(db_select($sql) == false){
					

					echo "<script> window.alert('Erro - O cnpj especificado não foi encontrado!'); </script>";
					echo $link;
				}

				$sql = "UPDATE $produto SET `idproduto`='$idproduto',`nome`='$nome',`preco`='$preco',`estoque`='$estoque',`cnpj_fornecedor`='$cnpj',`path`='$nome_img',`descricao`='$descricao' WHERE `idproduto`=$idproduto";

				$atualiza = db_update($sql);

				if(!$atualiza){
					echo "<script> window.alert('Erro ao atualizar no banco de dados!'); </script>";
					echo $link;

				}else{
					echo "<script> window.alert('Atualização concluída'); </script>";
					echo $link;
				}		
				
				

			}


			function pesquisa_produto($produto, $link){
				#$sql = "UPDATE $tabela SET `cpf`='$cpf',`nome`='$nome',`senha`='$senha',`endereco`='$endereco',`email`='$email',`telefone`='$telefone',`datanascimento`='$datanascimento' WHERE `cpf`=$cpf";
				


				$this->set_idproduto($_POST["idproduto"]);
				#var_dump($this->get_idproduto());
				if(!$this->validar_idproduto()){
					echo "<script> window.alert('Erro - O ID fornecido: [ $idproduto ] não é válido!'); </script>";
					#var_dump($this->get_idproduto());
					echo $link;					

				}

				$idproduto = $this->get_idproduto();


				$sql = "SELECT * FROM $produto WHERE `idproduto` like '$idproduto'";

				if(db_select($sql) == false){
					echo "<script> window.alert('Erro - O ID fornecido: [ $idproduto ] não foi encontrado!'); </script>";
					echo $link;
				}
				
				$busca = db_update($sql);					
				$i = 1;

				while($dados = mysqli_fetch_array($busca)){

				   	$print = "";
				   	$print .= "<html><div class='lupdate' style = 'left: 150px; top:20px;' ><br>";
				   	$print .= "<form style = 'position: absolute; bottom: 10px; left: 177px;' method = post accept-charset='UTF-8' action ='atualizar.php' ><input  class = 'button' 		type = submit value = 'Voltar'></form>";
				   	$print .= "Produto encontrado";
				   	$print .= "<p>ID: ".$dados["idproduto"]."</p>";
				    $print .= "<p>Nome: ".$dados["nome"]."</p>";
				   	$print .= "<p>Preço: R$".$dados["preco"]."</p>";
				    $print .= "<p>Estoque: ".$dados["estoque"]."</p>";
				    $print .= "<p>CNPJ do fornecedor: ".$dados["cnpj_fornecedor"]."</p>";
				    #$print .= "<p>Descrição: ".$dados["descricao"]."</p>";

				    if(isset($dados["path"])){
				    	$print .= "<p>Path da imagem anexada: ".$dados["path"]."</p><br>";
				    	$print .= "<img style = 'border: solid gray 1px;' src=".$dados["path"]." alt='imagem'><br>";

				    }

				    
				    #$print .= "</form>";

				    $print .= "<form style = 'top:60px; left:650px; width: 400px; height: 580px;'  class = 'rcrud' method = post accept-charset='UTF-8' action = 'update_produto.php' enctype='multipart/form-data'><p style = 'font-family: tech; left: 200px font-size: 20px; '>Atualização do produto</p><input type = hidden name = idproduto  placeholder = 'idproduto' value = ".$dados["idproduto"]."><BR><BR><input type = text name = nome placeholder = 'Nome do produto' value = ".$dados["nome"]."><BR><BR><input type = text name = preco accept-charset='UTF-8' placeholder = 'Preço ex: 999,89' ><BR><BR><input type = text name = estoque placeholder = 'Estoque ex: 1000' value = ".$dados["estoque"]."><BR><BR><input type = text name = cnpj placeholder = 'CNPJ Fornecedor' value = ".$dados["cnpj_fornecedor"]."><BR><BR><input  name='arquivo' type='file' ><BR><BR><textarea name = descricao row = '25' columns = '100' placeholder = 'Descrição do produto.'></textarea><BR><BR><BR><BR><input class = 'button' type = reset value = 'reset'><BR><BR><input class = 'button' type = submit value = 'send'></form>";
				    $print .= "</div></html>";
				    echo $print;
				    $i++;
				}
			}


#*************************************************************************************************************************



			function cadastro_produto($produto, $fornecedor, $pk, $link, $link2){


				if(!isset($_FILES['arquivo']['name'] ) && $_FILES['arquivo']['error'] == 0){
					
					echo "<script> window.alert('Erro - Para realizar o cadastro do produto é preciso anexar uma imagem!'); </script>";
					echo $link;
					
				}

				$this->set_idproduto($_POST["idproduto"]);
				$this->set_preco($_POST["preco"]);

				$this->set_estoque($_POST["estoque"]);
				$this->set_nome($_POST["nome"]);

				
				$this->set_path(pathinfo ( $_FILES['arquivo']['name'], PATHINFO_EXTENSION ));
				$this->set_nome_img($_FILES['arquivo']['name']);

				Fornecedor::set_cnpj($_POST["cnpj"]);

				
				if(!Fornecedor::validar_cnpj()){
					
					echo "<script> window.alert('Erro - Preencha novamente os campos!'); </script>";
					echo $link;
					

				}

				$retorno = $this->validar_produto();

				if(!$retorno){
					
					echo "<script> window.alert('Erro - Preencha novamente os campos!'); </script>";
					echo $link;

				}

				if(!$this->validar_nome_img()){
					echo "<script> window.alert('Erro - Preencha novamente os campos!'); </script>";
					echo $link;
				}


				$idproduto = $this->get_idproduto();
				$preco = $this->get_preco();
				$estoque = $this->get_estoque();
				$nome = $this->get_nome();
				$nome_img = $this->get_nome_img();

				$cnpj = Fornecedor::get_cnpj();

				$descricao = $_POST["descricao"];

				$sql = "SELECT * FROM $fornecedor WHERE `cnpj` like '$cnpj'";

				if(db_select($sql) == false){
					

					echo "<script> window.alert('Erro - O cnpj especificado não foi encontrado!'); </script>";
					echo $link;
				}

				$sql = "SELECT * FROM $produto WHERE `idproduto` like '$idproduto'";

				if(db_select($sql) == true){
					

					echo "<script> window.alert('Erro - O ID [ $idproduto ] já possui um cadastro no sistema!'); </script>";
					echo $link;
				}

				$sql = "INSERT INTO $produto (`idproduto`, `nome`, `preco`, `estoque`, `cnpj_fornecedor`, `path`, `descricao`) VALUES ('$idproduto', '$nome', '$preco', '$estoque', '$cnpj', '$nome_img', '$descricao')";


				/*var_dump($sql);
				echo "<br>";
				var_dump($nome);
				echo "<br>";
				var_dump($nome_img);*/
				#var_dump($sql);
				if(db_insert($sql)){

					echo "<script> window.alert('Cadastro concluído!'); </script>";
					echo $link;	

				}else{
					
					echo "<script> window.alert('Erro ao inserir no banco de dados!'); </script>";
					echo $link;	
				}

				return true;



			}

		}

		class Servico extends Produto{
			
			private $cpf;
			private $status;
			private $id_solicitacao;

			function __construct(){
				
				Produto::set_idproduto("");
				Produto::set_nome("");
				Produto::set_preco("");
				
				Produto::set_descricao("");				
			}

			function set_cpf($arg){
				
				$this->cpf = trim($arg);
			}

			function get_cpf(){
				
				return $this->cpf;
			}

			function set_status($arg){
				
				$this->status = trim($arg);
			}

			function get_status(){
				
				return $this->status;
			}

			function set_id_solicitacao($arg){
				
				$this->id_solicitacao = trim($arg);
			}

			function get_id_solicitacao(){
				
				return $this->id_solicitacao;
			}



			function validar_cpf_orcamento(){
			
				$temp = $this->get_cpf();
				$temp = preg_replace('/[^\d]/', '',$temp);
				$temp = trim($temp);
				$this->set_cpf(preg_replace('!\s+!', '', $temp));


				if (empty($this->get_cpf())){				
					echo "<script> window.alert('Erro - Campo CPF vazio!'); </script>";
					return false;
				}

				if(strpos($this->get_cpf(), " ")){
					
					echo "<script> window.alert('Erro - CPF contém espaços!'); </script>";
					return false;				
				}

				if(!is_numeric($this->get_cpf())){
					
					echo "<script> window.alert('Erro - CPF contém caracteres não numéricos!'); </script>";
					return false;
				}

				return true;

			}


			function validar_id_solicitacao(){
				

				$this->set_id_solicitacao(preg_replace('!\s+!', '', $this->get_id_solicitacao()));
				if(empty($this->get_id_solicitacao())){
					
					echo "<script> window.alert('Erro - Campo ID vazio!'); </script>";
					return false;

				}
				if(strlen($this->get_id_solicitacao())<= 0 || strlen($this->get_id_solicitacao()) > 6){
					
					echo "<script> window.alert('Erro - Campo ID deve possuir entre 1 e 5 caracteres numéricos!'); </script>";
					return false;

				}

				if(!is_numeric($this->get_id_solicitacao())){
					
					echo "<script> window.alert('Erro - Campo ID contém caracteres não numéricos!'); </script>";
					return false;

				}

				if (!ctype_alnum($this->get_id_solicitacao())){
					echo "<script> window.alert('Erro - Campo ID contém caracteres não numéricos!'); </script>";
					return false;				

				}

				return true;

			}



			function validar_nome_servico(){
				
				$a = strtoupper($this->get_nome());
				$a = trim($a);
				$this->set_nome(preg_replace('!\s+!', ' ', $a));




				if(empty($this->get_nome())){
					echo "<script> window.alert('Erro - Campo Nome vazio!'); </script>";
					return false;

				}

				if(is_numeric($this->get_nome())){
					echo "<script> window.alert('Erro - Campo Nome contém caracteres inválidos!'); </script>";
					return false;		

				}

				    

				if(!preg_match('|^[\pL\s]+$|u', $this->get_nome())){
					echo "<script> window.alert('Erro - Campo Nome contém caracteres inválidos!'); </script>";
					return false;				

				}

				if(strlen($this->get_nome()) <= 2){
					echo "<script> window.alert('Erro - Campo Nome insuficiente!'); </script>";
					return false;				
				}



				return true;


			}


			function deletar_servico($servico, $tabela_secundaria, $fk, $link, $link2, $id, $action){
				
				$this->set_idproduto($_POST["idservico"]);			
				$idservico = $this->get_idproduto();
				$sql = "SELECT * FROM $servico WHERE `idservico` like $idservico";


								
				if(db_select($sql) == false){
					
					echo "<script> window.alert('Erro - O ID especificado não foi encontrado!'); </script>";
					echo $link2;
					
				}

				$sql = "DELETE FROM $servico WHERE `idservico` = $idservico";

				$sql2 = "DELETE FROM `servico_prestado` WHERE `id_servico` = $idservico";
				db_delete($sql2);

				if(db_delete($sql)){
					

					echo "<script> window.alert('Serviço deletado com sucesso!'); </script>";
					echo $link;

				}else{
					echo "<script> window.alert('Erro ao deletar serviço especificado!'); </script>";
					echo $link2;
				}


			}


			function atualizar_dados_servico($servico, $link, $link2){
				


				$this->set_idproduto($_POST["idservico"]);
				$this->set_nome($_POST["nome"]);
				$this->set_preco($_POST["preco"]);
				$this->set_descricao($_POST["descricao"]);


				

				if(!$this->validar_nome_servico() || !$this->validar_preco()){
					
					echo "<script> window.alert('Erro - Preencha novamente os campos!'); </script>";
					echo $link;

				}	
				
				$idservico = $this->get_idproduto();
				$preco = $this->get_preco();
				$nome = $this->get_nome();
				$descricao = $this->get_descricao();

				$sql = "SELECT * FROM $servico WHERE `idservico` like '$idservico'";

				if(db_select($sql) == false){

					echo "<script> window.alert('Erro - O ID especificado não foi encontrado!'); </script>";
					echo $link;
				}

				$sql = "UPDATE $servico SET `idservico`='$idservico',`nome`='$nome',`preco`='$preco',`descricao`='$descricao' WHERE `idservico`=$idservico";

				$atualiza = db_update($sql);

				if(!$atualiza){
					echo "<script> window.alert('Erro ao atualizar no banco de dados!'); </script>";
					echo $link;

				}else{
					echo "<script> window.alert('Atualização concluída'); </script>";
					echo $link;
				}		
				
				

			}

			

			function remover_servico($servico, $tabela_secundaria, $pk, $link, $link2, $id, $action){
				#$sql = "UPDATE $tabela SET `cpf`='$cpf',`nome`='$nome',`senha`='$senha',`endereco`='$endereco',`email`='$email',`telefone`='$telefone',`datanascimento`='$datanascimento' WHERE `cpf`=$cpf";
				


				$this->set_idproduto($_POST["idservico"]);
				#var_dump($this->get_idproduto());
				if(!$this->validar_idproduto()){
					echo "<script> window.alert('Erro - O ID fornecido: [ $this->get_idproduto() ] não é válido!'); </script>";
					#var_dump($this->get_idproduto());
					echo $link;					

				}

				$idservico = $this->get_idproduto();


				$sql = "SELECT * FROM $servico WHERE `idservico` like '$idservico'";

				if(db_select($sql) == false){
					echo "<script> window.alert('Erro - O ID fornecido: [ $idservico ] não foi encontrado!'); </script>";
					echo $link;
				}
				
				$busca = db_update($sql);					
				$i = 1;

				while($dados = mysqli_fetch_array($busca)){

				   	$print = "";
				   	$print .= "<html><div class='lupdate' style = 'font-family: courier; left: 30%; ' ><br>";
				   	$print .= "<form style = 'position: absolute; bottom: 10px; left: 177px;' method = post accept-charset='UTF-8' action ='crud_servico.php' ><input  class = 'button' 		type = submit value = 'Voltar'></form>";
				   	$print .= "Produto encontrado";
				   	$print .= "<p>ID: ".$dados["idservico"]."</p>";
				    $print .= "<p>Nome: ".$dados["nome"]."</p>";
				   	$print .= "<p>Preço: R$".$dados["preco"]."</p>";
				    $print .= "<p>Descricao: ".$dados["descricao"]."</p>";
				    #$print .= "<p>CNPJ do fornecedor: ".$dados["cnpj_fornecedor"]."</p>";
				    #$print .= "<p>Descrição: ".$dados["descricao"]."</p>";


				    
				    #$print .= "</form>";

				    $print .= "<form style = 'position: absolute; bottom: 100px; left: 280px;' method = post accept-charset='UTF-8' action = ".$action."><input type = hidden name = idservico  placeholder = 'idservico' value = ".$dados["idservico"]."><input class = 'button' type = submit value = 'Deletar serviço'></form>
				    <br>
				    <form style = 'position: absolute; bottom: 100px; left: 40px;' method = post accept-charset='UTF-8' action = 'remove.php'><input class = 'button' type = submit value = 'Voltar'></form>";
				    $print .= "</div></html>";
				    echo $print;
				    $i++;
				}
			}

			function deletar_orcamento($link){

				$id_solicitacao = $_POST["idsolicitacao"];

				$sql = "SELECT * FROM `servico_prestado` WHERE `id_solicitacao` like '$id_solicitacao'";


				if(!db_select($sql)){
					
					echo "<script> window.alert('ID de orçamento [ $id_solicitacao ] não encontrado!'); </script>";
					echo $link;	
				}

				$sql = "DELETE FROM `servico_prestado` WHERE `id_solicitacao` like '$id_solicitacao'";

				$temp = db_delete($sql);

				if(!isset($temp)){
					
					echo "<script> window.alert('Erro ao excluir orçamento!'); </script>";
					echo $link;	
				}else{
					
					echo "<script> window.alert('Orçamento [ $id_solicitacao ] excluído!'); </script>";
					echo $link;						
				}


			}


			function update_orcamento($link){
				
				$status = $_POST["status"];
				$this->set_descricao($_POST["descricao"]);
				$observacao = $this->get_descricao();
				$id_solicitacao = $_POST["idsolicitacao"];

				$sql = "UPDATE `servico_prestado` SET `status`= '$status',`observacao`='$observacao' WHERE `id_solicitacao` like '$id_solicitacao'";
				#var_dump($sql);
				$temp = db_update($sql);
				if(isset($temp)){
					
					echo "<script> window.alert('Orçamento atualizado!'); </script>";
					echo $link;	
				}else{
					
					echo "<script> window.alert('Erro ao atualizar'); </script>";
					echo $link;		
				}

			}


			function atualizar_orcamento($link){
				
				$this->set_id_solicitacao($_POST["idsolicitacao"]);

				if(!$this->validar_id_solicitacao()){
					
					echo "<script> window.alert('ID não é válido!'); </script>";
					echo $link;						
				}

				$id_solicitacao = $this->get_id_solicitacao();
				$sql = "SELECT * FROM `servico_prestado` WHERE `id_solicitacao` like '$id_solicitacao'";

				if(!db_select($sql)){
					echo "<script> window.alert('ID [ $id_solicitacao ] não encontrado!'); </script>";
					echo $link;						

				}

				

				$sql = "SELECT * FROM `servico_prestado` WHERE `id_solicitacao` like '$id_solicitacao'";
				$busca = db_update($sql);					
				$i = 1;

				while($dados = mysqli_fetch_array($busca)){

				   	$print = "";
				   	$print .= "<html><div class='lupdate' style = 'left: 150px; top:20px;' ><br>";
				   	$print .= "<form style = 'position: absolute; bottom: 50px; left: 280px;' method = post accept-charset='UTF-8' action ='crud_servico.php' ><input  class = 'button' 		type = submit value = 'Voltar'></form>";
				   	$print .= "<form style = 'position: absolute; bottom: 50px; left: 50px;' method = post accept-charset='UTF-8' action ='deletar_orcamento.php' >
				   	<input type = hidden name = idsolicitacao  placeholder = 'idsolicitacao' value = ".$dados["id_solicitacao"].">
				   	<input  class = 'button' 		type = submit value = 'Deletar orçamento'></form>";
				   #	$print .= "<form style = 'position: absolute; bottom: 50px; left: 80px;' method = post accept-charset='UTF-8' action ='orcamento_servico.php' ><input type = hidden name = idservico  placeholder = 'idservico' value = ".$dados["idservico"].">     <input  class = 'button' 		type = submit value = 'Registro de orçamento'></form>";
				   	$print .= "Solicitacao de serviço<br><br>";
				   	$print .= "<p>ID do orçamento: ".$dados["id_solicitacao"]."</p>";
				   	$print .= "<p>CPF do cliente: ".$dados["id_cliente"]."</p>";
				   	$print .= "<p>CPF do funcionario: ".$dados["id_funcionario"]."</p>";
				   	$print .= "<p>ID do serviço prestado: ".$dados["id_servico"]."</p>";
				   	$print .= "<p>Status: ".$dados["status"]."</p>";
				   	$print .= "<p>Previsão de conclusão: ".$dados["previsao"]."</p>";
				   	$print .= "<p>Observações: ".$dados["observacao"]."</p>";
				   	

				    #$print .= "<p>CNPJ do fornecedor: ".$dados["cnpj_fornecedor"]."</p>";
				    #$print .= "<p>Descrição: ".$dados["descricao"]."</p>";


				    
				    #$print .= "</form>";
				    #<select name = 'status'><option value = ''> </option></select>
				    #<input type = text name = id_solicitacao placeholder = 'Defina um ID para o orçamento'>

				    $print .= "<form style = 'top:80px; left:650px; width: 300px; height: 450px;'  class = 'rcrud' method = post accept-charset='UTF-8' action = 'update_orcamento.php' enctype='multipart/form-data'>
				    <input type = hidden name = idsolicitacao  placeholder = 'idsolicitacao' value = ".$dados["id_solicitacao"].">
				    <p style = 'font-family: tech; left: 200px font-size: 20px; '><BR>Alterar Status do serviço</p>   
				    <select name = 'status'>
					    <option value = 'Aprovado'>Aprovado</option>
					    <option value = 'Atrasado'>Atrasado</option>
					    <option value = 'Cancelado'>Cancelado</option>
					    <option value = 'Concluido'>Concluído</option>
				    </select>
				    <BR>
				    
				    <p style = 'font-family: tech; left: 200px font-size: 20px; '>Informações adicionais</p>   
				    
				    <textarea name = descricao row = '25' columns = '100' placeholder = 'Observações'></textarea>
				    <BR><BR><BR>
				    <input class = 'button' type = reset value = 'Limpar'><BR><BR><input class = 'button' type = submit value = 'Atualizar'></form>";
				    $print .= "</div></html>";
				    echo $print;
				    $i++;
				}

			}
			function registrar_orcamento($link, $link2){
								
				$this->set_id_solicitacao($_POST["id_solicitacao"]);
				$execucao = $_POST["execucao"];
				$this->set_idproduto($_POST["id_servico"]);
				$this->set_cpf($_POST["id_cliente"]);

				$this->set_status($_POST["status"]);
				$this->set_descricao($_POST["descricao"]);

				if(!$this->validar_cpf_orcamento()){
					
					echo "<script> window.alert('Erro'); </script>";
					echo $link;	

				}
				$id_solicitacao = $this->get_id_solicitacao();
				$id_cliente = $this->get_cpf();
				$id_funcionario = $_POST["id_funcionario"];
				$id_servico = $this->get_idproduto();
				
				$status = $this->get_status();
				$observacao = $this->get_descricao();

				$sql = "SELECT * FROM `pessoa` WHERE `cpf` like '$id_cliente'";

				if(!db_select($sql)){
					
					echo "<script> window.alert('Somente clientes cadastrados podem solicitar serviços!'); </script>";
					echo $link2;						
				}

				$sql = "SELECT * FROM `servico_prestado` WHERE `id_solicitacao` like '$id_solicitacao'";

				if(db_select($sql)){
					
					echo "<script> window.alert('O ID [ $id_solicitacao ] já está cadastrado no sistema!'); </script>";
					echo $link2;				
				}
				
				$sql = "INSERT INTO `servico_prestado`(`id_solicitacao`, `id_cliente`, `id_funcionario`, `id_servico`, `status`, `observacao`) VALUES ('$id_solicitacao', '$id_cliente', '$id_funcionario', '$id_servico', '$status', '$observacao')";

				#var_dump($sql);
				$insert = db_insert($sql);
				
				if($insert){
					
					$sql = "UPDATE `servico_prestado` SET `previsao` = DATE_ADD(CURDATE(), INTERVAL '$execucao' DAY) WHERE `id_solicitacao` = '$id_solicitacao'";
					db_update($sql);
					var_dump($sql);

					echo "<script> window.alert('Registro concluido!'); </script>";
					echo $link;	
				}else{
					
					echo "<script> window.alert('Erro ao inserir no banco!'); </script>";
					echo $link;					
				}
				


			}
			function orcamento_servico($link){
				

				$id_funcionario = $_SESSION['usuario'];
				$idservico = $_POST["idservico"];

				$sql = "SELECT * FROM `servico` WHERE `idservico` like '$idservico'";
				if(!db_select($sql)){

					echo "<script> window.alert('Erro - A ID [ $idservico ] não está cadastrada no sistema!'); </script>";
					echo $link;	

				}
				$busca = db_update($sql);					
				$i = 1;

				while($dados = mysqli_fetch_array($busca)){

				   	$print = "";
				   	$print .= "<html><div class='lupdate' style = 'left: 150px; top:20px;' ><br>";
				   	$print .= "<form style = 'position: absolute; bottom: 50px; left: 185px;' method = post accept-charset='UTF-8' action ='crud_servico.php' ><input  class = 'button' 		type = submit value = 'Voltar'></form>";
				   #	$print .= "<form style = 'position: absolute; bottom: 50px; left: 80px;' method = post accept-charset='UTF-8' action ='orcamento_servico.php' ><input type = hidden name = idservico  placeholder = 'idservico' value = ".$dados["idservico"].">     <input  class = 'button' 		type = submit value = 'Registro de orçamento'></form>";
				   	$print .= "Serviço pesquisado<br><br>";
				   	$print .= "<p>ID: ".$dados["idservico"]."</p>";
				    $print .= "<p>Nome: ".$dados["nome"]."</p>";
				   	$print .= "<p>Preço: R$".$dados["preco"]."</p>";
				   	$print .= "<p>Tempo de execução: ".$dados["execucao"]." dia(s)</p>";
				    $print .= "<p>Descricao: ".$dados["descricao"]."</p>";
				    #$print .= "<p>CNPJ do fornecedor: ".$dados["cnpj_fornecedor"]."</p>";
				    #$print .= "<p>Descrição: ".$dados["descricao"]."</p>";


				    
				    #$print .= "</form>";
				    #<select name = 'status'><option value = ''> </option></select>
				    #<input type = text name = id_solicitacao placeholder = 'Defina um ID para o orçamento'>

				    $print .= "<form style = 'top:80px; left:650px; width: 300px; height: 450px;'  class = 'rcrud' method = post accept-charset='UTF-8' action = 'registrar_orcamento.php' enctype='multipart/form-data'>
				    <p style = 'font-family: tech; left: 200px font-size: 20px; '>    Orçamento  </p>   
				    
				    <BR>
				    <input type = text name = id_cliente placeholder = 'CPF do Cliente'>
				    
				    <p style = 'font-family: tech; left: 200px font-size: 20px; '>ID do orçamento</p>   
				    <input type = text name = id_solicitacao placeholder = 'Defina um ID'>
				    <BR><BR>
				    <input type = hidden name = id_servico  placeholder = 'idservico' value = ".$dados["idservico"].">
				    <input type = hidden name = id_funcionario  placeholder = 'idfuncionario' value = ".$id_funcionario.">
				    <input type = hidden name = status  placeholder = 'status' value = 'Pendente'>
				    <input type = hidden name = execucao value = ".$dados["execucao"].">
				    <BR><BR>
				    <textarea name = descricao row = '25' columns = '100' placeholder = 'Observações'></textarea>
				    <BR><BR><BR>
				    <input class = 'button' type = reset value = 'Limpar'><BR><BR><input class = 'button' type = submit value = 'Registrar'></form>";
				    $print .= "</div></html>";
				    echo $print;
				    $i++;
				}
				#$_SESSION['senha'];

			}


			function pesquisa_servico($servico, $link){
				#$sql = "UPDATE $tabela SET `cpf`='$cpf',`nome`='$nome',`senha`='$senha',`endereco`='$endereco',`email`='$email',`telefone`='$telefone',`datanascimento`='$datanascimento' WHERE `cpf`=$cpf";
				


				$this->set_idproduto($_POST["idservico"]);
				#var_dump($this->get_idproduto());
				if(!$this->validar_idproduto()){
					echo "<script> window.alert('Erro - O ID fornecido: [ $this->get_idproduto() ] não é válido!'); </script>";
					#var_dump($this->get_idproduto());
					echo $link;					

				}

				$idservico = $this->get_idproduto();


				$sql = "SELECT * FROM $servico WHERE `idservico` like '$idservico'";

				if(db_select($sql) == false){
					echo "<script> window.alert('Erro - O ID fornecido: [ $idservico ] não foi encontrado!'); </script>";
					echo $link;
				}
				
				$busca = db_update($sql);					
				$i = 1;

				while($dados = mysqli_fetch_array($busca)){

				   	$print = "";
				   	$print .= "<html><div class='lupdate' style = 'left: 150px; top:20px;' ><br>";
				   	$print .= "<form style = 'position: absolute; bottom: 50px; left: 270px;' method = post accept-charset='UTF-8' action ='crud_servico.php' ><input  class = 'button' 		type = submit value = 'Voltar'></form>";
				   	$print .= "<form style = 'position: absolute; bottom: 50px; left: 80px;' method = post accept-charset='UTF-8' action ='orcamento_servico.php' ><input type = hidden name = idservico  placeholder = 'idservico' value = ".$dados["idservico"].">     <input  class = 'button' 		type = submit value = 'Registro de orçamento'></form>";
				   	$print .= "Serviço disponível";
				   	$print .= "<p>ID: ".$dados["idservico"]."</p>";
				    $print .= "<p>Nome: ".$dados["nome"]."</p>";
				   	$print .= "<p>Preço: R$".$dados["preco"]."</p>";
				    $print .= "<p>Descricao: ".$dados["descricao"]."</p>";
				    #$print .= "<p>CNPJ do fornecedor: ".$dados["cnpj_fornecedor"]."</p>";
				    #$print .= "<p>Descrição: ".$dados["descricao"]."</p>";


				    
				    #$print .= "</form>";

				    $print .= "<form style = 'top:60px; left:650px; width: 400px; height: 580px;'  class = 'rcrud' method = post accept-charset='UTF-8' action = 'update_servico.php' enctype='multipart/form-data'><p style = 'font-family: tech; left: 200px font-size: 20px; '>Atualização do serviço</p><input type = hidden name = idservico  placeholder = 'idservico' value = ".$dados["idservico"]."><BR><BR><input type = text name = nome placeholder = 'Nome do serviço' value = ".$dados["nome"]."><BR><BR><input type = text name = preco accept-charset='UTF-8' placeholder = 'Preço ex: 999,89' ><BR><BR><textarea name = descricao row = '25' columns = '100' placeholder = 'Descrição do produto.'></textarea><BR><BR><BR><BR><input class = 'button' type = reset value = 'reset'><BR><BR><input class = 'button' type = submit value = 'send'></form>";
				    $print .= "</div></html>";
				    echo $print;
				    $i++;
				}
			}

			function cadastro_servico($servico, $fornecedor, $pk, $link, $link2){
				

				$this->set_idproduto($_POST["idservico"]);
				$this->set_nome($_POST["nome"]);
				$this->set_preco($_POST["preco"]);
				$this->set_descricao($_POST["descricao"]);

				$execucao = $_POST["execucao"];

				if(!$this->validar_idproduto() || !$this->validar_nome_servico() || !$this->validar_preco()){
					echo "<script> window.alert('Preencha novamente os campos!'); </script>";
					echo $link2;					
				}

				$idservico = $this->get_idproduto();
				$nome = $this->get_nome();
				$preco = $this->get_preco();
				$descricao = $this->get_descricao();

				$sql = "SELECT * FROM `servico` WHERE `idservico` like '$idservico'";


				if(db_select($sql) == true){
					

					echo "<script> window.alert('Erro - O ID de serviço especificado já possui um cadastro no sistema!'); </script>";
					echo $link2;
				} 

				$sql = "INSERT INTO `servico` (`idservico`, `nome`, `preco`, `descricao`, `execucao`) VALUES ('$idservico', '$nome', '$preco', '$descricao', '$execucao')";
				#var_dump($sql);
				$insert = db_insert($sql);

				if($insert){
					echo "<script> window.alert('Cadastro concluido!'); </script>";
					echo $link2;					
				}else{
					echo "<script> window.alert('Erro ao inserir no banco de dados!'); </script>";
					echo $link2;					
				}


			}
			function financeiro($servico, $link, $link2){
				
				$tipo = $_POST["tipo"];
				$categoria = $_POST["categoria"];
				$id_funcionario = $_POST["idfuncionario"];

				$this->set_preco($_POST["valor"]);
				$this->set_descricao($_POST["descricao"]);

				if(!$this->validar_preco()){
					
					echo "<script> window.alert('Preencha novamente os dados!'); </script>";
					echo $link2;						
				}

				$valor = $this->get_preco();
				$observacao = $this->get_descricao();

				$sql = "SELECT * FROM `pessoa` WHERE '$id_funcionario' = `cpf`";
				#var_dump($sql);
				if(!db_select($sql)){
					
					echo "<script> window.alert('CPF do funcionario [ $id_funcionario ] não possui um cadastro no sistema!'); </script>";
					echo $link2;
				}else{

					$sql = "INSERT INTO `contas`(`id_funcionario`, `tipo`, `categoria`, `observacao`, `valor`) VALUES ('$id_funcionario', '$tipo', '$categoria', '$observacao', '$valor')";

					db_update($sql);
					echo "<script> window.alert('Entrada inserida!'); </script>";
					echo $link2;					

				}


			}

			function balanco($servico, $link, $link2){
				
				$total = 0;
				$sql = "SELECT `categoria`, `valor`, `tipo` FROM `contas`";
				$busca = db_update($sql);

				$i = 1;
				
				$print = "";
				$print = "		<div class = 'bar' style = 'margin-bottom:20px;position:absolute;top:2px;font-family:arial; font-size: 16px;'>
			<ul>
				<li><a class = id = 'logo'         href = 'logout_func.php'>LOG OUT</a>
				<a id = 'produtos'     href = 'crud_func.php'>CADASTRAR PERFIL</a>
				<a id = 'cliente'      href = 'atualizar.php'>ATUALIZAR PERFIL</a>
				<a id = 'fornecedor'   href = 'remove.php'>REMOVER PERFIL</a>
				<a id = 'atendimento'  href = 'relatorio.php'>RELATÓRIOS</a>
				<a id = 'trabalhe_conosco'  href = 'crud_servico.php'>SERVIÇOS</a>
				<a id = 'log_out' href = 'crud_produto.php' >PRODUTOS</a></li>
			</ul>
		</div>";
			    $print .= "<html><div style = 'top:30px;position:relative;color:white;font-family:tech;width:300px;height:100%; ' class='lcrud' ><br>";
			    $print .= "Controle Financeiro [ Despesas ]<br><br>";
			    while($dados = mysqli_fetch_array($busca)){

			    	
			    	#$print .= "Bem vindo(a) ".$dados["categoria"].".";
			    	#$print .= "<p>Informações da sua conta</p>";
			    	#$print .= "".$dados["categoria"].".";
			    	if($dados["tipo"] == "Despesa"){
			    		$print .= "<p>Despesa - ".$dados["categoria"].": -".$dados["valor"]."R$</p>";
			    		$total -= $dados["valor"];

			    	}/*else{
			    		$print .= "<p>Lucro - ".$dados["categoria"].": +".$dados["valor"]."R$</p>";
			    		$total += $dados["valor"];
			    	}*/

			        
			        echo $print;
			        $print = "";
			        $i++;
			    }	
			    $print ="";
			    $print.= "<br>Total: ".$total."R$";

			    $print .= "</html>";
			    echo $print;


			    $print = "";


			    $i = 1;
			    $total = 0;
			    $busca = db_update($sql);

			    $print .= "<html><div style = 'top:0px;position:absolute;color:white;font-family:tech;width:300px;height:100%; ' class='ccrud' ><br>";
			    $print .= "Controle Financeiro [ Lucros ]<br><br>";
			    while($dados = mysqli_fetch_array($busca)){

			    	
			    	#$print .= "Bem vindo(a) ".$dados["categoria"].".";
			    	#$print .= "<p>Informações da sua conta</p>";
			    	#$print .= "".$dados["categoria"].".";
			    	if($dados["tipo"] == "Lucro"){
			    		$print .= "<p>Lucro - ".$dados["categoria"].": +".$dados["valor"]."R$</p>";
			    		$total += $dados["valor"];

			    	}/*else{
			    		$print .= "<p>Lucro - ".$dados["categoria"].": +".$dados["valor"]."R$</p>";
			    		$total += $dados["valor"];
			    	}*/

			        
			        echo $print;
			        $print = "";
			        $i++;
			    }	
			    $print ="";
			    $print.= "<br>Total: ".$total."R$";

			    $print .= "</html>";
			    echo $print;
			    $print = "";


			}

			function aprova_rejeita_rating($servico, $link){
				
				$cpf = $_POST["cpf"];
				$id_solicitacao = $_POST["idsolicitacao"];
				
				

				if(!isset($_POST["status"])){
					
					$rating = $_POST["rating"];	
							
					$sql = "UPDATE `servico_prestado` SET `rating`='$rating' WHERE `id_cliente` like $cpf and `id_solicitacao` like '$id_solicitacao'";
					db_update($sql);

					echo "<script> window.alert('Agradecemos o feedback!'); </script>";
					echo $link;	
				}else{
					
					$status = $_POST["status"];

					$sql = "UPDATE `servico_prestado` SET `status`='$status' WHERE `id_cliente` like $cpf and `id_solicitacao` like '$id_solicitacao'";
					db_update($sql);
	
					if($status == "Aprovado"){

						echo "<script> window.alert('Orçamento aprovado!'); </script>";
						echo $link;					

					}else if($status == "Cancelado"){
						
						echo "<script> window.alert('Orçamento cancelado!'); </script>";
						echo $link;	
					}
				}
			}
		}


		class Cliente extends Pessoa{
			function __construct(){
				
				Pessoa::set_cpf("0");
				Pessoa::set_nome("0");
				Pessoa::set_senha("0");

				Pessoa::set_endereco("0");
				Pessoa::set_email("0");
				Pessoa::set_telefone("0");
				Pessoa::set_data_nascimento("0");

				

			}


			function cadastro($form_page, $tabela_secundaria, $pk_tabela_secundaria, $link, $link2){
				
				Pessoa::set_cpf($_POST["cpf"]);
				Pessoa::set_nome($_POST["nome"]);
				Pessoa::set_senha($_POST["senha"]);

				if(!Pessoa::append_endereco($_POST["enderecoI"], $_POST["enderecoII"], $_POST["enderecoIII"], $_POST["enderecoIV"]))
					echo $link2;
					

				Pessoa::set_email($_POST["email"]);
				Pessoa::set_telefone($_POST["telefone"]);
				Pessoa::set_data_nascimento($_POST["datanascimento"]);

				
				$retorno = Pessoa::validar_form();
				
				
				


				$cpf = Pessoa::get_cpf();
				$nome = Pessoa::get_nome();
				$senha = Pessoa::get_senha();
				$endereco = Pessoa::get_endereco();
				$email = Pessoa::get_email();
				$telefone = Pessoa::get_telefone();
				$datanascimento = Pessoa::get_data_nascimento();



				if($retorno == false){
					echo "<script> window.alert('Preencha novamente os campos!'); </script>";
					echo $link2;

				}else{

					#$connect = db_connect();

					$sql = "INSERT INTO `pessoa` (`cpf`, `nome`, `senha`, `endereco`, `email`, `telefone`, `datanascimento`) VALUES ('$cpf', '$nome', '$senha', '$endereco', '$email', '$telefone', '$datanascimento')";

					$sql2 = "INSERT INTO $tabela_secundaria ($pk_tabela_secundaria) VALUES ('$cpf')";
					
					#$insert  = mysqli_query($connect, $sql);
					$insert  = db_insert($sql);

					if(!$insert){

						
						echo "<script> window.alert('Erro - CPF informado [ $cpf ] já possui um cadastro no sistema'); </script>";
						echo $link2;

					}else{

						db_insert_tabela_secundaria($sql2);
						echo "<script> window.alert('Cadastro concluido!'); </script>";
						echo $link;
					}
				}
			}


			function info_cliente($cpf){
				
				$sql = "SELECT * FROM `pessoa` WHERE '$cpf' like `cpf`";
				$busca = db_update($sql);

				$i = 1;
			    while($dados = mysqli_fetch_array($busca)){

			    	$print = "";
			    	$print .= "<html><div style = 'left: 150px; bottom: 0px; ' class='leftbar' ><br>";
			    	$print .= "Bem vindo(a) ".$dados["nome"].".";
			    	$print .= "<p>Informações da sua conta</p>";
			    	$print .= "<p>Nome: ".$dados["nome"]."</p>";
			    	$print .= "<p>Senha: ".$dados["senha"]."</p>";
			    	$print .= "<p>CPF: ".$dados["cpf"]."</p>";
			    	#$print .= "<p>ID: ".$dados[$id]."</p>";
			    	$print .= "<p>Endereço: ".$dados["endereco"]."</p>";
			    	$print .= "<p>Email: ".$dados["email"]."</p>";
			    	$print .= "<p>Telefone: ".$dados["telefone"]."</p>";
			    	$print .= "<p>Data de nascimento: ".$dados["datanascimento"]."</p>";
			    	$print .= "<form style = 'position: absolute; bottom: 70px; left: 40px;' method = post accept-charset='UTF-8' action ='pesquisa_pagina_cliente.php'>
			    	<input type = hidden name = cpf  placeholder = 'CPF' value = ".$dados["cpf"].">
			    	<input class = 'button' 		type = submit value = 'Editar informações'>

			    	</form>";
			    	$print .= "<form style = 'position: absolute; bottom: 70px; right: 44px;' method = post accept-charset='UTF-8' action ='info_orcamentos.php'>
			    	<input type = hidden name = cpf  placeholder = 'CPF' value = ".$dados["cpf"].">
			    	<input class = 'button' 		type = submit value = 'Orçamentos'>
			    	</form>";
			        $print .= "</html>";
			        echo $print;
			        $i++;
			    }				

			}

			function nome_servico($id_servico){
				
				$sql = "SELECT `nome` FROM `servico` WHERE '$id_servico' = `idservico`";
				$busca = db_update($sql);
				$dados = mysqli_fetch_array($busca);
				$temp = $dados["nome"];
				#var_dump($dados["nome"]);
				return $temp;

			}

			function info_orcamentos($link){
				
				$cpf = $_POST["cpf"];
				#var_dump($cpf);
				$sql = "SELECT * FROM `servico_prestado` WHERE '$cpf' = `id_cliente` ORDER BY `previsao` DESC";
				#var_dump($sql);
				if(db_select_list($sql) == false){
					echo "<script> window.alert('Não há serviços solicitados nesta conta!'); </script>";
					echo $link;
				}
				$busca = db_update($sql);
				$jump = "<br><br><br><br><br>>";
				$i = 1;
				$foo = "";
				$foo .= "<div><p style = 'text-align:center;font-family:tech;padding-top:15px;border: solid white 2px; background-color: rgba(0,0,255,.1); height: 50px; width: 100%;'><a href = 'pagina_cliente.php'>VOLTAR</a><div>";
				$foo .="</p>";
				$print = "<html><div class='row' style = 'z-index:1; overflow: auto;'><br>";

				echo $foo;
				while($dados = mysqli_fetch_array($busca)){

				   	$print = "";
				   	#$print .= "<html><div class='row' ><br>";
				   	$print .=  "
								<table class = 'coluna'>
									<tr>
										<td>
										<div>
											<td>
												<div >
													<h1>Serviço: ".$this->nome_servico($dados["id_servico"])."</h1>
												</div>
												
												<div >
													<p style = 'text-align: center;'>Cod Serviço: ".$dados["id_servico"]."</p>
													<p style = 'text-align: center;'>ID do orçamento: ".$dados["id_solicitacao"]."</p>
												</div>
												
												<div>
													<p style = 'text-align: center;'>Status: ".$dados["status"]."</p>";
													if($dados["status"] == "Pendente"){
														$print .= "<form method = post accept-charset='UTF-8' action ='aprova_rejeita_rating.php'>
														<input type = hidden name = cpf  placeholder = 'CPF' value = ".$dados["id_cliente"].">
														<input type = hidden name = idsolicitacao  placeholder = 'CPF' value = ".$dados["id_solicitacao"].">";
														$print .= "<input type = hidden name = status  placeholder = 'status' value = 'Aprovado'>";
														$print .= "<input  class = 'button' 		type = submit value = 'Aprovar'>";
														$print .="</form>";

														$print .= "<form method = post accept-charset='UTF-8' action ='aprova_rejeita_rating.php'>
														<input type = hidden name = cpf  placeholder = 'CPF' value = ".$dados["id_cliente"].">
														<input type = hidden name = idsolicitacao  placeholder = 'CPF' value = ".$dados["id_solicitacao"].">";
														$print .= "<input type = hidden name = status  placeholder = 'status' value = 'Cancelado'>";
														$print .= "<input  class = 'button' 		type = submit value = 'Cancelar'>";
														$print .="</form>";	
																											
													}else if($dados["status"] == "Concluido" && $dados["rating"] == NULL){
														$print .= "<form method = post accept-charset='UTF-8' action ='aprova_rejeita_rating.php'>
														<input type = hidden name = cpf  placeholder = 'CPF' value = ".$dados["id_cliente"].">
														<input type = hidden name = idsolicitacao  placeholder = 'CPF' value = ".$dados["id_solicitacao"].">";
														$print .= "<select name = rating>
														<option value = 'Bom'>Bom</option>
														<option value = 'Razoavel'>Razoável</option>
														<option value = 'Ruim'>Ruim</option>
														</select>";
														$print .= "<input  class = 'button' 		type = submit value = 'Avaliar'>"; 
														$print .="</form>";		
																			

													}else if($dados["rating"] != NULL){
														
														$print .= "<div>
																		<p style = 'font-size:20px;'>Feedback: ".$dados["rating"]."</p>
																  </div>";

													}

													$print .="


													
												</div>

												<div>
													<p style = 'font-size:20px;'>Previsão de conclusão: ".$dados["previsao"]."</p>
													<p style = 'font-size:20px;'>Observações: ".$dados["observacao"]."</p>
												</div>
											</td>

											
										</div>
									
										</td>
									</tr>
								</table>";
					$print .= $jump;		

				    echo $print;
				    $print = "";
				    #var_dump($print);
				    $i++;
				}
				$print .= "</div></html>";
				#var_dump($i);

			}

			function logar_cliente($tabela, $tabela2, $on, $link, $link2){

				
				
				$usuario = $_POST["cpf"];
				$senha   = $_POST["senha"];


				$sql = "SELECT * FROM $tabela JOIN $tabela2 on '$usuario' = `cpf_cliente`  WHERE `cpf` like '$usuario' and `senha` like '$senha'";

				$login = Pessoa::logar($sql);

				if (isset($_SESSION['usuario']) and isset($_SESSION['senha']) ) {

					session_destroy();
					unset ($_SESSION['usuario']);
					unset ($_SESSION['senha']);
					echo "<script> window.alert('AQ!'); </script>";
					session_start();
				}

				

				if($login){
					
					$_SESSION['usuario'] = $_POST["cpf"];
					$_SESSION['senha'] = $_POST["senha"];
					#$_SESSION['nome'] = $_POST["nome"];
					echo "<script> window.alert('Bem-Vindo(a) !')</script>";
					echo $link;
					
					

				}else{

					session_destroy();
					unset ($_SESSION['usuario']);
					unset ($_SESSION['senha']);
					echo "<script> window.alert('Usuário não encontrado!'); </script>";

					echo $link2;

					

				}				
			}
		}
	?>

	</body>
</html>
