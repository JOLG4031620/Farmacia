<?php
	
	$nombres = filter_input(INPUT_POST, 'nombreuser');
	$apellidos = filter_input(INPUT_POST,'apellidosuser');
	$email = filter_input(INPUT_POST,'emailuser');
	$pass = filter_input(INPUT_POST,'pass');
	$rpass = filter_input(INPUT_POST,'rpass');
	if(!empty($nombres)){
		if (!empty($apellidos)){
			if(!empty($email)) {
				if(!empty($pass)){
					if(!empty($rpass)){
						if ($pass != $rpass) {
							die('Las contraseñas no coinciden, verifiquelas. ');
						}
						else {

						$host = "localhost";
						$dbusername = "root";
						$dbpassword = "";
						
						$dbname = "usuarios";

						//<1>
						$conn = new mysqli ($host, $dbusername, $dbpassword, $dbname);
							if(mysqli_connect_error()){
								die('Error de conexión ('. mysqli_connect_errno() .')'
								. mysqli_connect_error());
						//</1>
						}else {
							// <2>
							$sql = "INSERT INTO datos
								VALUES ('$nombres','$apellidos','$email','$pass')";
							// </2>
							if ($conn->query($sql)){
								echo"Nuevo registro añadido";

							}else {
								echo "Error: ". $sql ."<br>". $conn->error;
							}

						}}
					}
					else{
						echo "Vuelve a escribir la contraseña";
						die();}
				}
				else{
					echo "La contraseña no puede quedar vacía";
					die();}
			}
			else{
				echo "El email no puede quedar vacío";
				die();}
		}
		else{
			echo "Faltan los apellidos";
			die();}
	}
	else{
		echo "El nombre no puede quedar vacío";
		die();}

	



?>