<?php
	include 'conexion.php';
	$nombre = strip_tags($_POST['nombre']);
	$apellido = strip_tags($_POST['apellido']);
	$pais_nacimiento = strip_tags($_POST['pais_nacimiento']);
	$fecha_nacimiento = strip_tags($_POST['fecha_nacimiento']);
	$nombre_artistico = strip_tags($_POST['nombre_artistico']);


	if(preg_match('/[A-Za-z áéíóúñ]{2,50}/i', $nombre)){
		if(preg_match('/[A-Za-z áéíóúñ]{2,50}/i', $apellido)){
                        if(preg_match('/[A-Za-z áéíóúñ]{2,50}/i', $pais_nacimiento)){
				if(preg_match('/[A-Za-z áéíóúñ]{2,50}/i', $nombre_artistico)){
                        		$insercion= "insert into bdrecords.artistas(nombre,apellido,pais_nacimiento,fecha_nacimiento,nombre_artistico) values('$nombre','$apellido','$pais_nacimiento','$fecha_nacimiento','$nombre_artistico')";
        				$query = pg_query($con,$insercion);
        				if($query){
                				echo "Se ha almacenado en la base de datos de forma correcta  ";
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
