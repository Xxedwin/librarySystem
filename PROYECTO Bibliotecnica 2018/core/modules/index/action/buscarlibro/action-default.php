
<?php if(isset($_GET["product"]) && $_GET["product"]!=""):?>
	<?php
$products = BookData::getLike($_GET["product"]);
if(count($products)>0){
	?>
<h3>Resultados de la Busqueda</h3>
<table class="table table-bordered table-hover">
	<thead>
		<th>ISBN</th>
		<th>Titulo</th>
		<th>Institución</th>
		<th>Autor</th>
		<th>Ejemplares</th>
		<th>Disponibles</th>
	</thead>
	<?php
$products_in_cero=0;
	 foreach($products as $product):
	?>
		
	<tr>
		<td style="width:80px;"><?php echo $product->isbn; ?></td>
		<td><?php echo $product->title; ?></td>
		<td><?php echo $product->institucion; ?></td>
		<td><?php echo $product->name; ?> <?php echo $product->lastname; ?></td>
		<td><?php echo ItemData::countByBookId($product->id)->c; ?></td>
		<td><?php echo ItemData::countAvaiableByBookId($product->id)->c; ?></td>
	</tr>
	
	<?php endforeach;?>
</table>

	<?php
}else{
	echo "<br><p class='alert alert-danger'>No se encontró el libro que estás buscando</p>";
}
?>
<hr><br>
<?php else:
?>
<?php endif; ?>