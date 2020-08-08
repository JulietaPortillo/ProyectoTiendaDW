<?php
include "configs/config.php";
include "configs/funciones.php";

if(!isset($p)){    /*si pagina no es iguala pagina*/
	$p = "principal";     /* Página sera igual a Principal*/
}else{
	$p = $p;				/*De lo contrario pagina sera igual a página seleccionada*/
}

?>

<!DOCTYPE html>
<html>
<head>
	<link rel="stylesheet" href="css/estilo.css"/>
	<link rel="stylesheet" href="bootstrap/css/bootstrap.css"/>
	<link rel="stylesheet" href="fontawesome/css/all.css"/>
	<script type="text/javascript" src="bootstrap/js/bootstrap.js"></script>
	<script type="text/javascript" src="fontawesome/js/all.js"></script>
	<script type="text/javascript" src="js/jquery.js"></script>
	<script type="text/javascript" src="js/app.js"></script>
	<title>Tienda Online</title> 
</head>
<body>
	<div class="header">
		Tienda Online
	</div>

	<div class="menu">
		<a href="?p=principal">Principal</a>
		<a href="?p=productos">Productos</a>
		<a href="?p=ofertas">Ofertas</a>
		<a href="?p=carrito">Carrito</a>
		<a href="?p=admin">Administrador</a>

		<!--<?php
		if(isset($_SESSION['id_cliente'])){
		?>
		<a href="?p=carrito">Mi Carrito</a>
		<a href="?p=miscompras">Mis Compras</a>
		<?php
		}else{
			?>
				<a href="?p=login">Iniciar Sesion</a>
				<a href="?p=registro">Registrate</a>
			<?php
		}
		?>-->

		<?php
			if(isset($_SESSION['id_cliente'])){
		?>

		<a class="pull-right subir" ghref="?p=salir">salir</a>
		<a class="pull-right subir" href="#"><?=nombre_cliente($_SESSION['id_cliente'])?></a>
		<?php
			}
		?>
		
				
	</div>

	<div class="cuerpo">
		<?php
			if(file_exists("modulos/".$p.".php")){  /*Si existe el archivo en la carpeta modulos p.php*/
				include "modulos/".$p.".php";		/*Entonces incluirlo y mostrarlo*/
			}else{
				echo "<i>No se ha encontrado el modulo <b>".$p."</b> <a href='./'>Regresar</a></i>";  /*De lo contrario no se ha encontrado el modulo*/
			}
		?>
	</div>

	<div class ="footer">
		Copyright Danilo Pérez &copy; <?=date("Y")?>
	</div>


</body>
</html>