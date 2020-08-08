<?php
check_user("productos"); 

if (isset($agregar) && isset($cant)){

	$idp = clear($agregar);
	$cant = clear($cant);
	$id_cliente = clear($_SESSION['id_cliente']);

	$v = $mysqli->query("SELECT * FROM carro WHERE id_cliente ='$id_cliente' AND id_producto = '$idp'");

	if(mysqli_num_rows($v)>0){
		$q = $mysqli->query("UPDATE carro SET cant = cant + $cant WHERE id_cliente = '$id_cliente' AND id_producto = '$idp'");

	}else{
		$q = $mysqli->query("INSERT INTO carro (id_cliente,id_producto,cant) VALUES ($id_cliente,$idp,$cant)");

	}
	
	alert("Se ha agregado al carro de compras");
	redir("?p=productos");
}

$q = $mysqli->query("SELECT * FROM productos ORDER BY id DESC"); /*Cargar en una sentecnia de mysql query Seleccionar todos 																los	productos y se muestren en forma descendiente*/
while($r=mysqli_fetch_array($q)){  /*Hacemos un array*/
	?>
		<div class="producto"> <!-- Creamos una division de la clase producto -->
			<div class="name_producto"><?=$r['name']?></div>
			<div><img class="img_producto" src="productos/<?=$r['imagen']?>"/></div> <!-- Mostramos la imagen 				                                                                     seleccionandola de la carpeta productos -->
			<span class="precio"><br><?=$r['price']?> <?=$divisa?></span>
			<button class="btn btn-warning pull-right" onclick="agregar_carro('<?=$r['id']?>');"><i class="fa fa-shopping-cart"></i></button>
		</div>
	<?php
}
?>

<script type="text/javascript">
	function agregar_carro(idp){
		var cant = prompt("¿Que cantidad desea agregar?",1);
		if(cant.length>0){
		window.location="?p=productos&agregar="+idp+"&cant="+cant;
	}
}
</script>