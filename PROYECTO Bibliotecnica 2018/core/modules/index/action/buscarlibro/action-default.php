
<?php if(isset($_GET["product"]) || $_GET["product"]==""):?>
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
		<!-- <th>Ejemplares</th> -->
		<th>Disponibles</th>
		<th>Detalle</th>
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
		<!-- <td><?php echo ItemData::countByBookId($product->id)->c; ?></td> -->
		<td><?php echo ItemData::countAvaiableByBookId($product->id)->c; ?></td>
		<td><button type="button" class="btn btn-link btn-detalle" value="1" data-toggle="modal" data-target="#myModal">Ver</button></td>
	</tr>

	<div class="modal  fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
	        <div class="modal-dialog">
	            <div class="modal-content">
	                <div class="modal-header text-blue">
	                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
	                    <span aria-hidden="true">×</span></button>
	                    <h4 class="modal-title">DESCRIPCION DEL LIBRO</h4>
	                </div>
	                <div class="modal-body">
	                    <div class="row">
	                        <div class="col-sm-4">
	                            <img src="" alt="" class="imagen img-responsive">
	                        </div>
	                        <div class="col-sm-8">
	                            <dl>
	                                <dt>CODIGO:</dt>
	                                <dd class="codigo_libro"></dd>
	                                <dt>TITULO:</dt>
	                                <dd class="titulo_libro"></dd>
	                                <dt>SUBTITULO:</dt>
	                                <dd class="subtitulo_libro"></dd>
	                                <dt>AUTOR:</dt>
	                                <dd class="autor_libro"></dd>
	                                <dt>ISBN:</dt>
	                                <dd class="isbn_libro"></dd>
	                                <dt>AÑO DE PUBLICACION:</dt>
	                                <dd class="publicacion_libro"></dd>
	                                <dt>EDITORIAL:</dt>
	                                <dd class="editorial_libro"></dd>
	                                <dt>EDICCION:</dt>
	                                <dd class="ediccion_libro"></dd>
	                                <dt>IDIOMA:</dt>
	                                <dd class="idioma_libro"></dd>
	                            </dl>
	                        </div>
	                    </div>
	                </div>
	                <div class="modal-footer text-center">
	                    <button type="button" class="btn btn-danger" data-dismiss="modal">Cerrar</button>
	                </div>
	            </div>
	        <!-- /.modal-content -->
	        </div>
	      <!-- /.modal-dialog -->
	    </div>
	
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