			$rua = strtoupper($rua);
			$rua = trim($rua);
			$rua = preg_replace('!\s+!', ' ', $rua);
			$a = preg_replace('!\s+!', '', $rua);

			if(empty($rua)){
				echo "<script> window.alert('Erro - Campo Rua vazio!'); </script>";
				return false;					

			}

			if(!preg_match('|^[\pL\s]+$|u', $a)){
				echo "<script> window.alert('Erro - Campo Rua deve ser composto apenas por letras e espaços!'); </script>";
				return false;				

			}

			if (!ctype_alnum($a)){
				echo "<script> window.alert('Erro - Campo Rua contém caracteres inválidos!'); </script>";
				return false;				

			}