<?php
	include 'conexion.php';
	$nombre = strip_tags($_POST['nombre']);
	$apaterno = strip_tags($_POST['apaterno']);
	$amaterno = strip_tags($_POST['amaterno']);
	$contrasena = strip_tags($_POST['contrasena']);


	if(preg_match('/[A-Za-z áéíóúñ]{2,50}/i', $nombre)){
		if(preg_match('/[A-Za-z áéíóúñ]{2,50}/i', $apaterno)){
                        if(preg_match('/[A-Za-z áéíóúñ]{2,50}/i', $amaterno)){
				if(preg_match('/[A-Za-z áéíóúñ]{2,50}/i', $contrasena)){
					$contrasena = password_hash($contrasena, PASSWORD_DEFAULT);
                        		$insercion= "insert into bdrecords.usuarios(nombre,apaterno,amaterno,contrasena) values('$nombre','$apaterno','$amaterno','$contrasena')";
        				$query = pg_query($con,$insercion);
        				if($query){
                				header("Location: index.php?success=true");
        				} else {
                				echo "  No se ha podido almacenar en la base de datos  ";
        				}
        				pg_close($con);
                		}
	                }
        	}
	}
	else {
		echo "  Los datos no son validos  ";
	}
?>
